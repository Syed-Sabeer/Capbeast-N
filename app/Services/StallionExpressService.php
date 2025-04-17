<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\OrderShippingRate;

class StallionExpressService
{
    protected $baseUrl;
    protected $token;

    public function __construct()
    {
        $this->baseUrl = config('services.stallion.sandbox', false)
            ? rtrim(config('services.stallion.sandbox_url', 'https://ship.stallionexpress.ca/api/v4'), '/')
            : rtrim(config('services.stallion.base_url', 'https://api.stallionexpress.ca/api/v4'), '/');
        $this->token = config('services.stallion.token');
    }

    protected function headers()
    {
        return [
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];
    }

    public function getRates(array $payload)
    {
        try {
            // Log the request payload
            Log::info('Sending shipping rate request to Stallion Express', [
                'payload' => json_encode($payload, JSON_PRETTY_PRINT)
            ]);

            // Ensure endpoint URL is properly constructed
            $endpoint = "{$this->baseUrl}/rates";
            Log::info('Stallion Express API endpoint', ['url' => $endpoint, 'headers' => $this->headers()]);

            $response = Http::withHeaders($this->headers())
                ->timeout(config('services.stallion.timeout', 30))
                ->post($endpoint, $payload);

            $responseData = $response->json();

            // Log the response
            Log::info('Stallion Express Rate Response', [
                'status' => $response->status(),
                'response' => json_encode($responseData, JSON_PRETTY_PRINT)
            ]);

            if (!$response->successful()) {
                Log::error('Stallion Express shipping API error', [
                    'status' => $response->status(),
                    'url' => $endpoint,
                    'response_body' => $responseData,
                    'raw_response' => $response->body()
                ]);
                return [
                    'success' => false,
                    'message' => $responseData['message'] ?? 'Failed to fetch shipping rates',
                    'errors' => $responseData['errors'] ?? []
                ];
            }

            return $responseData;
        } catch (\Exception $e) {
            Log::error('Error in StallionExpressService::getRates', [
                'error' => $e->getMessage(),
                'url' => $this->baseUrl . '/rates',
                'trace' => $e->getTraceAsString()
            ]);
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function getShipments(array $query = [])
    {
        $response = Http::withHeaders($this->headers())
            ->get("{$this->baseUrl}/shipments", $query);
        return $response->json();
    }

    public function createShipment($payload, $orderId)
    {
        try {
            // Validate required fields
            $requiredFields = [
                'to_address.city',
                'to_address.province_code',
                'to_address.postal_code',
                'items.0.description',
                'items.0.value'
            ];

            $missingFields = [];
            foreach ($requiredFields as $field) {
                $value = data_get($payload, $field);
                if (empty($value)) {
                    $missingFields[] = $field;
                }
            }

            if (!empty($missingFields)) {
                Log::error('Missing required fields in shipment payload:', [
                    'missing_fields' => $missingFields,
                    'payload' => $payload
                ]);
                throw new \Exception('Missing required fields: ' . implode(', ', $missingFields));
            }

            // Auto-correct DC ZIP codes
            if (data_get($payload, 'to_address.country_code') === 'US') {
                $stateCode = data_get($payload, 'to_address.province_code');
                $zipCode = data_get($payload, 'to_address.postal_code');

                // Clean up ZIP code
                $zipCode = preg_replace('/[^0-9]/', '', $zipCode);

                // Use only first 5 digits for validation
                if (strlen($zipCode) >= 5) {
                    $zipCode = substr($zipCode, 0, 5);
                }

                // Check for DC ZIP codes (20001-20599)
                if ($zipCode >= '20001' && $zipCode <= '20599') {
                    // Automatically correct the state code to DC
                    $expectedState = 'DC';
                    if ($stateCode !== $expectedState) {
                        Log::info('Auto-correcting state code for DC ZIP code', [
                            'zip_code' => $zipCode,
                            'original_state' => $stateCode,
                            'corrected_state' => $expectedState
                        ]);
                        data_set($payload, 'to_address.province_code', $expectedState);
                    }
                } else {
                    // For non-DC ZIP codes, perform normal validation
                    if (!$this->validateUsZipCodeState($zipCode, $stateCode)) {
                        Log::error('ZIP code validation failed:', [
                            'zip_code' => $zipCode,
                            'state_code' => $stateCode
                        ]);

                        // Get the expected state for this ZIP code (if possible)
                        $expectedState = $this->getStateFromZipCode($zipCode);
                        $errorMessage = "The ZIP code {$zipCode} does not match the state {$stateCode}.";

                        if ($expectedState) {
                            $errorMessage .= " ZIP code {$zipCode} appears to be in {$expectedState}.";
                        }

                        $errorMessage .= " Please verify the shipping address.";

                        throw new \Exception($errorMessage);
                    }
                }
            }

            // Format and validate Canadian postal code
            if (data_get($payload, 'to_address.country_code') === 'CA') {
                $postalCode = data_get($payload, 'to_address.postal_code');
                $formattedPostalCode = $this->formatCanadianPostalCode($postalCode);

                if (!$formattedPostalCode) {
                    Log::error('Invalid Canadian postal code:', [
                        'postal_code' => $postalCode
                    ]);
                    throw new \Exception("The postal code {$postalCode} is not a valid Canadian postal code format (A1A 1A1).");
                }

                // Update the payload with the formatted postal code
                data_set($payload, 'to_address.postal_code', $formattedPostalCode);
            }

            // Log the complete request payload
            Log::info('Stallion Express Shipment Request:', [
                'url' => $this->baseUrl . '/shipments',
                'payload' => json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
            ]);

            // Generate idempotency key based on order ID
            $idempotencyKey = 'order-' . $orderId . '-' . time();

            $response = Http::withHeaders(array_merge($this->headers(), [
                'Idempotency-Key' => $idempotencyKey
            ]))
                ->post($this->baseUrl . '/shipments', $payload);

            // Log the raw response first
            Log::info('Stallion Express Raw Response:', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);

            $responseData = $response->json();

            // Log the complete parsed response
            Log::info('Stallion Express Shipment Response:', [
                'response' => json_encode($responseData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
            ]);

            if (!$response->successful()) {
                Log::error('Stallion Express API Error:', [
                    'status' => $response->status(),
                    'error' => $responseData
                ]);
                throw new \Exception('Failed to create shipment: ' . ($responseData['message'] ?? 'Unknown error'));
            }

            // Validate response structure
            if (!isset($responseData['success']) || !$responseData['success']) {
                Log::error('Invalid response structure:', [
                    'response' => $responseData
                ]);
                throw new \Exception('Invalid response from Stallion Express API');
            }

            // Check for tracking code
            if (!isset($responseData['tracking_code'])) {
                Log::error('No tracking code in response:', [
                    'response' => $responseData
                ]);
                throw new \Exception('No tracking code received from Stallion Express API');
            }

            // Update order with tracking information
            $order = Order::find($orderId);
            if ($order) {
                $order->update([
                    'shipping_tracking_id' => $responseData['tracking_code'],
                    'shipping_carrier' => $responseData['rate']['postage_type'] ?? null,
                    'shipping_service' => $responseData['rate']['package_type'] ?? null,
                    'shipping_estimated_days' => $responseData['rate']['delivery_days'] ?? null,
                ]);

                // Update or create shipping rate record
                OrderShippingRate::updateOrCreate(
                    ['order_id' => $orderId],
                    [
                        'tracking_number' => $responseData['tracking_code'],
                        'tracking_url' => $responseData['tracking_url'] ?? null,
                        'label_url' => $responseData['label_url'] ?? null,
                        'label_base64' => $responseData['label'] ?? null,
                        'postage_type' => $responseData['rate']['postage_type'] ?? null,
                        'package_type' => $responseData['rate']['package_type'] ?? null,
                        'shipping_price' => $responseData['rate']['rate'] ?? null,
                        'delivery_days' => $responseData['rate']['delivery_days'] ?? null,
                        'service_name' => $responseData['rate']['postage_type'] ?? null,
                        'rate_details' => $responseData['rate'] ?? []
                    ]
                );
            }

            return $responseData;
        } catch (\Exception $e) {
            Log::error('Stallion Express Shipment Creation Error:', [
                'error' => $e->getMessage(),
                'payload' => $payload,
                'order_id' => $orderId
            ]);
            throw $e;
        }
    }

    public function trackShipment($tracking_code)
    {
        $response = Http::withHeaders($this->headers())
            ->get("{$this->baseUrl}/track", [
                'tracking_code' => $tracking_code,
            ]);

        return $response->json();
    }

    public function getShipmentDetails($ship_code)
    {
        $response = Http::withHeaders($this->headers())
            ->get("{$this->baseUrl}/shipments/{$ship_code}");

        return $response->json();
    }

    public function voidShipment($ship_code)
    {
        $response = Http::withHeaders($this->headers())
            ->get("{$this->baseUrl}/shipments/{$ship_code}/void");

        return $response->json();
    }

    /**
     * Format and log the shipment response
     *
     * @param array $responseData The shipment response data
     * @param int $orderId The order ID
     * @return array The formatted response
     */
    public function formatShipmentResponse($responseData, $orderId)
    {
        // Format response similar to the example
        $formattedResponse = [
            'success' => $responseData['success'] ?? false,
            'label' => $responseData['label'] ?? 'base64_label',
            'tracking_code' => $responseData['tracking_code'] ?? '',
            'message' => $responseData['message'] ?? 'Shipment processing complete',
            'shipment' => null,
            'rate' => [
                'postage_type' => $responseData['rate']['postage_type'] ?? '',
                'package_type' => $responseData['rate']['package_type'] ?? '',
                'trackable' => true,
                'base_rate' => $responseData['rate']['rate'] ?? 0,
                'add_ons' => [null],
                'rate' => $responseData['rate']['rate'] ?? 0,
                'tax' => $responseData['rate']['tax'] ?? 0,
                'total' => $responseData['rate']['total'] ?? 0,
                'currency' => $responseData['rate']['currency'] ?? 'CAD',
                'delivery_days' => $responseData['rate']['delivery_days'] ?? '2'
            ]
        ];

        // Log the formatted response
        Log::info('Formatted Stallion Express Shipment Response:', [
            'order_id' => $orderId,
            'response' => json_encode($formattedResponse, JSON_PRETTY_PRINT)
        ]);

        return $formattedResponse;
    }

    /**
     * Validate that a US ZIP code is valid for the given state
     * 
     * @param string $zipCode The ZIP code to validate
     * @param string $stateCode The state code to validate against
     * @return bool Whether the ZIP code is valid for the state
     */
    private function validateUsZipCodeState($zipCode, $stateCode)
    {
        try {
            // Clean up ZIP code
            $zipCode = preg_replace('/[^0-9]/', '', $zipCode);

            // Basic validation
            if (empty($zipCode) || strlen($zipCode) < 5) {
                Log::error('Invalid ZIP code format', ['zip_code' => $zipCode]);
                return false;
            }

            // Use only first 5 digits for validation
            $zipCode = substr($zipCode, 0, 5);

            // Special case handling for DC (Washington DC)
            if ($zipCode >= '20001' && $zipCode <= '20599' && $stateCode === 'DC') {
                return true;
            }

            // Call external API to validate ZIP code against state
            $apiUrl = "https://api.zippopotam.us/us/" . $zipCode;

            $response = Http::timeout(5)->get($apiUrl);

            if (!$response->successful()) {
                Log::error('ZIP code validation API error', [
                    'zip_code' => $zipCode,
                    'state_code' => $stateCode,
                    'status' => $response->status()
                ]);

                // Fallback to our cached data if API fails
                return $this->validateZipCodeWithFallback($zipCode, $stateCode);
            }

            $data = $response->json();

            // API returns places array with state abbreviations
            if (isset($data['places']) && is_array($data['places']) && count($data['places']) > 0) {
                $apiStateCode = $data['places'][0]['state abbreviation'] ?? null;

                // Log the result for debugging
                Log::info('ZIP code validation result', [
                    'zip_code' => $zipCode,
                    'provided_state_code' => $stateCode,
                    'api_state_code' => $apiStateCode,
                    'matches' => $apiStateCode === $stateCode
                ]);

                return $apiStateCode === $stateCode;
            }

            // If API doesn't return state data, fall back to our cached data
            Log::warning('ZIP code API did not return state data', ['zip_code' => $zipCode]);
            return $this->validateZipCodeWithFallback($zipCode, $stateCode);
        } catch (\Exception $e) {
            Log::error('Error in ZIP code validation', [
                'zip_code' => $zipCode,
                'state_code' => $stateCode,
                'error' => $e->getMessage()
            ]);

            // Fallback to our cached data if API throws exception
            return $this->validateZipCodeWithFallback($zipCode, $stateCode);
        }
    }

    /**
     * Fallback method for ZIP code validation when API is unavailable
     * 
     * @param string $zipCode The ZIP code to validate
     * @param string $stateCode The state code to validate against
     * @return bool Whether the ZIP code is valid for the state
     */
    private function validateZipCodeWithFallback($zipCode, $stateCode)
    {
        $zipPrefix = substr($zipCode, 0, 2);
        $zipFirst3 = substr($zipCode, 0, 3);

        // Special case for DC ZIP codes
        if ($zipPrefix === '20' && $stateCode === 'DC') {
            return true;
        }

        // More comprehensive state to ZIP mapping
        $stateZipMap = [
            'AL' => ['35', '36'],
            'AK' => ['995', '996', '997', '998', '999'],
            'AZ' => ['85', '86', '855', '856', '857', '859', '860', '863', '864', '865'],
            'AR' => ['716', '717', '718', '719', '720', '721', '722', '723', '724', '725', '726', '727', '728', '729'],
            'CA' => ['900', '901', '902', '903', '904', '905', '906', '907', '908', '909', '910', '911', '912', '913', '914', '915', '916', '917', '918', '919', '920', '921', '922', '923', '924', '925', '926', '927', '928', '929', '930', '931', '932', '933', '934', '935', '936', '937', '938', '939', '940', '941', '942', '943', '944', '945', '946', '947', '948', '949', '950', '951', '952', '953', '954', '955', '956', '957', '958', '959', '960', '961'],
            'CO' => ['80', '81'],
            'CT' => ['06'],
            'DE' => ['197', '198', '199'],
            'DC' => ['200', '202', '203', '204', '205'],
            'FL' => ['32', '33', '34', '320', '321', '322', '323', '324', '325', '326', '327', '328', '329', '330', '331', '332', '333', '334', '335', '336', '337', '338', '339', '341', '342', '344', '346', '347', '349'],
            'GA' => ['30', '31', '39', '398', '399'],
            'HI' => ['967', '968'],
            'ID' => ['832', '833', '834', '835', '836', '837', '838'],
            'IL' => ['60', '61', '62', '600', '601', '602', '603', '604', '605', '606', '607', '608', '609', '610', '611', '612', '613', '614', '615', '616', '617', '618', '619', '620', '622', '623', '624', '625', '626', '627', '628', '629'],
            'IN' => ['46', '47', '460', '461', '462', '463', '464', '465', '466', '467', '468', '469', '470', '471', '472', '473', '474', '475', '476', '477', '478', '479'],
            'IA' => ['50', '51', '52', '500', '501', '502', '503', '504', '505', '506', '507', '508', '509', '510', '511', '512', '513', '514', '515', '516', '520', '521', '522', '523', '524', '525', '526', '527', '528'],
            'KS' => ['66', '67', '660', '661', '662', '663', '664', '665', '666', '667', '668', '669', '670', '671', '672', '673', '674', '675', '676', '677', '678', '679'],
            'KY' => ['40', '41', '42', '400', '401', '402', '403', '404', '405', '406', '407', '408', '409', '410', '411', '412', '413', '414', '415', '416', '417', '418', '420', '421', '422', '423', '424', '425', '426', '427'],
            'LA' => ['70', '71', '700', '701', '703', '704', '705', '706', '707', '708', '710', '711', '712', '713', '714'],
            'ME' => ['039', '040', '041', '042', '043', '044', '045', '046', '047', '048', '049'],
            'MD' => ['20', '21', '206', '207', '208', '209', '210', '211', '212', '214', '215', '216', '217', '218', '219'],
            'MA' => ['01', '02', '05', '010', '011', '012', '013', '014', '015', '016', '017', '018', '019', '020', '021', '022', '023', '024', '025', '026', '027', '055'],
            'MI' => ['48', '49', '480', '481', '482', '483', '484', '485', '486', '487', '488', '489', '490', '491', '492', '493', '494', '495', '496', '497', '498', '499'],
            'MN' => ['55', '56', '550', '551', '552', '553', '554', '555', '556', '557', '558', '559', '560', '561', '562', '563', '564', '565', '566', '567'],
            'MS' => ['38', '39', '386', '387', '388', '389', '390', '391', '392', '393', '394', '395', '396', '397'],
            'MO' => ['63', '64', '65', '630', '631', '633', '634', '635', '636', '637', '638', '639', '640', '641', '644', '645', '646', '647', '648', '650', '651', '652', '653', '654', '655', '656', '657', '658'],
            'MT' => ['59', '590', '591', '592', '593', '594', '595', '596', '597', '598', '599'],
            'NE' => ['68', '69', '680', '681', '683', '684', '685', '686', '687', '688', '689', '690', '691', '692', '693'],
            'NV' => ['889', '890', '891', '893', '894', '895', '897', '898'],
            'NH' => ['030', '031', '032', '033', '034', '035', '036', '037', '038'],
            'NJ' => ['07', '08', '070', '071', '072', '073', '074', '075', '076', '077', '078', '079', '080', '081', '082', '083', '084', '085', '086', '087', '088', '089'],
            'NM' => ['870', '871', '872', '873', '874', '875', '877', '878', '879', '880', '881', '882', '883', '884'],
            'NY' => ['10', '11', '12', '13', '14', '00', '100', '101', '102', '103', '104', '105', '106', '107', '108', '109', '110', '111', '112', '113', '114', '115', '116', '117', '118', '119', '120', '121', '122', '123', '124', '125', '126', '127', '128', '129', '130', '131', '132', '133', '134', '135', '136', '137', '138', '139', '140', '141', '142', '143', '144', '145', '146', '147', '148', '149'],
            'NC' => ['27', '28', '270', '271', '272', '273', '274', '275', '276', '277', '278', '279', '280', '281', '282', '283', '284', '285', '286', '287', '288', '289'],
            'ND' => ['580', '581', '582', '583', '584', '585', '586', '587', '588'],
            'OH' => ['43', '44', '45', '430', '431', '432', '433', '434', '435', '436', '437', '438', '439', '440', '441', '442', '443', '444', '445', '446', '447', '448', '449', '450', '451', '452', '453', '454', '455', '456', '457', '458'],
            'OK' => ['73', '74', '730', '731', '734', '735', '736', '737', '738', '739', '740', '741', '743', '744', '745', '746', '747', '748', '749'],
            'OR' => ['97', '970', '971', '972', '973', '974', '975', '976', '977', '978', '979'],
            'PA' => ['15', '16', '17', '18', '19', '150', '151', '152', '153', '154', '155', '156', '157', '158', '159', '160', '161', '162', '163', '164', '165', '166', '167', '168', '169', '170', '171', '172', '173', '174', '175', '176', '177', '178', '179', '180', '181', '182', '183', '184', '185', '186', '187', '188', '189', '190', '191', '192', '193', '194', '195', '196'],
            'RI' => ['028', '029'],
            'SC' => ['29', '290', '291', '292', '293', '294', '295', '296', '297', '298', '299'],
            'SD' => ['57', '570', '571', '572', '573', '574', '575', '576', '577'],
            'TN' => ['37', '38', '370', '371', '372', '373', '374', '375', '376', '377', '378', '379', '380', '381', '382', '383', '384', '385'],
            'TX' => ['75', '76', '77', '78', '79', '88', '750', '751', '752', '753', '754', '755', '756', '757', '758', '759', '760', '761', '762', '763', '764', '765', '766', '767', '768', '769', '770', '771', '772', '773', '774', '775', '776', '777', '778', '779', '780', '781', '782', '783', '784', '785', '786', '787', '788', '789', '790', '791', '792', '793', '794', '795', '796', '797', '798', '799', '885'],
            'UT' => ['84', '840', '841', '842', '843', '844', '845', '846', '847'],
            'VT' => ['05', '050', '051', '052', '053', '054', '056', '057', '058', '059'],
            'VA' => ['20', '22', '23', '24', '201', '220', '221', '222', '223', '224', '225', '226', '227', '228', '229', '230', '231', '232', '233', '234', '235', '236', '237', '238', '239', '240', '241', '242', '243', '244', '245', '246'],
            'WA' => ['98', '99', '980', '981', '982', '983', '984', '985', '986', '987', '988', '989', '990', '991', '992', '993', '994'],
            'WV' => ['24', '25', '26', '247', '248', '249', '250', '251', '252', '253', '254', '255', '256', '257', '258', '259', '260', '261', '262', '263', '264', '265', '266', '267', '268'],
            'WI' => ['53', '54', '530', '531', '532', '534', '535', '537', '538', '539', '540', '541', '542', '543', '544', '545', '546', '547', '548', '549'],
            'WY' => ['82', '820', '821', '822', '823', '824', '825', '826', '827', '828', '829', '830'],
            'PR' => ['00', '006', '007', '008', '009'],
            'VI' => ['008'],
            'GU' => ['969'],
            'AS' => ['96799'],
            'MP' => ['9695'],
            'FM' => ['9694'],
            'MH' => ['969'],
            'PW' => ['969'],
            'AA' => ['340'],
            'AE' => ['09', '090', '091', '092', '093', '094', '095', '096', '097', '098'],
            'AP' => ['96'],
        ];

        // Check for territories and military codes
        $specialCodes = [
            'PR' => ['00', '006', '007', '008', '009'],
            'VI' => ['008'],
            'GU' => ['969'],
            'AS' => ['96799'],
            'MP' => ['9695'],
            'FM' => ['9694'],
            'MH' => ['969'],
            'PW' => ['969'],
            'AA' => ['340'],
            'AE' => ['09', '090', '091', '092', '093', '094', '095', '096', '097', '098'],
            'AP' => ['96'],
        ];

        // Check for special cases first
        if (array_key_exists($stateCode, $specialCodes)) {
            foreach ($specialCodes[$stateCode] as $prefix) {
                if (strpos($zipCode, $prefix) === 0) {
                    return true;
                }
            }
        }

        // Check if state exists in our map
        if (!isset($stateZipMap[$stateCode])) {
            // If we don't have mapping data, assume it's valid
            Log::warning('No ZIP code mapping data for state', ['state_code' => $stateCode]);
            return true;
        }

        // First check 3-digit prefixes
        foreach ($stateZipMap[$stateCode] as $prefix) {
            if (strlen($prefix) === 3 && strpos($zipCode, $prefix) === 0) {
                return true;
            }
        }

        // Then check 2-digit prefixes
        foreach ($stateZipMap[$stateCode] as $prefix) {
            if (strlen($prefix) === 2 && strpos($zipCode, $prefix) === 0) {
                return true;
            }
        }

        // Handle overlapping ZIP codes for neighboring regions
        $sharedZipCodes = [
            // DC/MD/VA metro area has overlapping ZIP codes
            ['20', ['DC', 'MD', 'VA']],
            // ME/NH share some codes
            ['03', ['ME', 'NH']],
            // MA/RI share some codes
            ['02', ['MA', 'RI']],
            // NY/NJ share some codes
            ['10', ['NY', 'NJ']],
            // ID/WY
            ['83', ['ID', 'WY']],
            // OR/WA
            ['97', ['OR', 'WA']],
            // MS/TN
            ['38', ['MS', 'TN']],
            // GA/TN
            ['30', ['GA', 'TN']],
            // KY/WV
            ['41', ['KY', 'WV']],
            // LA/AR
            ['71', ['LA', 'AR']],
            // NM/TX
            ['88', ['NM', 'TX']],
            // AK/WA
            ['99', ['AK', 'WA']],
            // HI/CA (for some military bases)
            ['96', ['HI', 'CA']],
        ];

        // Check for shared ZIP codes
        foreach ($sharedZipCodes as [$prefix, $states]) {
            if (strpos($zipCode, $prefix) === 0 && in_array($stateCode, $states)) {
                return true;
            }
        }

        // If we get here, the ZIP code does not match the state
        Log::info('ZIP code does not match state', [
            'zip_code' => $zipCode,
            'state_code' => $stateCode
        ]);

        return false;
    }

    /**
     * Try to determine the state from a US ZIP code
     * 
     * @param string $zipCode The ZIP code to look up
     * @return string|null The state code (2-letter) or null if not found
     */
    private function getStateFromZipCode($zipCode)
    {
        try {
            // Clean up ZIP code
            $zipCode = preg_replace('/[^0-9]/', '', $zipCode);

            // Basic validation
            if (empty($zipCode) || strlen($zipCode) < 5) {
                return null;
            }

            // Use only first 5 digits
            $zipCode = substr($zipCode, 0, 5);

            // Call external API to get state info
            $apiUrl = "https://api.zippopotam.us/us/" . $zipCode;

            $response = Http::timeout(5)->get($apiUrl);

            if (!$response->successful()) {
                Log::warning('Could not determine state from API', [
                    'zip_code' => $zipCode,
                    'status' => $response->status()
                ]);

                // Fallback to our cached data
                return $this->getStateFromZipCodeWithFallback($zipCode);
            }

            $data = $response->json();

            // API returns places array with state abbreviations
            if (isset($data['places']) && is_array($data['places']) && count($data['places']) > 0) {
                return $data['places'][0]['state abbreviation'] ?? null;
            }

            // If API doesn't return state data, fall back to our mapping
            return $this->getStateFromZipCodeWithFallback($zipCode);
        } catch (\Exception $e) {
            Log::error('Error determining state from ZIP code', [
                'zip_code' => $zipCode,
                'error' => $e->getMessage()
            ]);

            // Fallback to our mapping if API throws exception
            return $this->getStateFromZipCodeWithFallback($zipCode);
        }
    }

    /**
     * Fallback method to determine state from ZIP code when API is unavailable
     * 
     * @param string $zipCode The ZIP code to look up
     * @return string|null The state code (2-letter) or null if not found
     */
    private function getStateFromZipCodeWithFallback($zipCode)
    {
        // Use lookup tables from validateZipCodeWithFallback method
        $zipPrefix = substr($zipCode, 0, 2);
        $zipFirst3 = substr($zipCode, 0, 3);

        // Special cases for Washington DC
        if ($zipCode >= '20001' && $zipCode <= '20599') {
            return 'DC';
        }

        // Comprehensive state to ZIP prefix mapping would go here
        // (This should match the mapping in validateZipCodeWithFallback)

        // Simplified check for demo purposes
        $prefixToState = [
            '00' => 'PR',
            '01' => 'MA',
            '02' => 'MA',
            '03' => 'NH',
            '04' => 'ME',
            '05' => 'VT',
            '06' => 'CT',
            '07' => 'NJ',
            '08' => 'NJ',
            '09' => 'AE',
            '10' => 'NY',
            '11' => 'NY',
            '12' => 'NY',
            '13' => 'NY',
            '14' => 'NY',
            '15' => 'PA',
            '16' => 'PA',
            '17' => 'PA',
            '18' => 'PA',
            '19' => 'PA',
            '20' => 'DC',
            '21' => 'MD',
            '22' => 'VA',
            '23' => 'VA',
            '24' => 'VA',
            '25' => 'WV',
            '26' => 'WV',
            '27' => 'NC',
            '28' => 'NC',
            '29' => 'SC',
            '30' => 'GA',
            '31' => 'GA',
            '32' => 'FL',
            '33' => 'FL',
            '34' => 'FL',
            '35' => 'AL',
            '36' => 'AL',
            '37' => 'TN',
            '38' => 'MS',
            '39' => 'MS',
            '40' => 'KY',
            '41' => 'KY',
            '42' => 'KY',
            '43' => 'OH',
            '44' => 'OH',
            '45' => 'OH',
            '46' => 'IN',
            '47' => 'IN',
            '48' => 'MI',
            '49' => 'MI',
            '50' => 'IA',
            '51' => 'IA',
            '52' => 'IA',
            '53' => 'WI',
            '54' => 'WI',
            '55' => 'MN',
            '56' => 'MN',
            '57' => 'SD',
            '58' => 'ND',
            '59' => 'MT',
            '60' => 'IL',
            '61' => 'IL',
            '62' => 'IL',
            '63' => 'MO',
            '64' => 'MO',
            '65' => 'MO',
            '66' => 'KS',
            '67' => 'KS',
            '68' => 'NE',
            '69' => 'NE',
            '70' => 'LA',
            '71' => 'LA',
            '72' => 'AR',
            '73' => 'OK',
            '74' => 'OK',
            '75' => 'TX',
            '76' => 'TX',
            '77' => 'TX',
            '78' => 'TX',
            '79' => 'TX',
            '80' => 'CO',
            '81' => 'CO',
            '82' => 'WY',
            '83' => 'ID',
            '84' => 'UT',
            '85' => 'AZ',
            '86' => 'AZ',
            '87' => 'NM',
            '88' => 'NM',
            '89' => 'NV',
            '90' => 'CA',
            '91' => 'CA',
            '92' => 'CA',
            '93' => 'CA',
            '94' => 'CA',
            '95' => 'CA',
            '96' => 'CA',
            '97' => 'OR',
            '98' => 'WA',
            '99' => 'WA'
        ];

        // Special cases for some ambiguous ZIP codes
        $specialZipPrefixes = [
            '20' => [
                ['20001', '20599', 'DC'],
                ['20600', '20799', 'MD'],
                ['20800', '20899', 'VA']
            ],
            '96' => [
                ['96700', '96798', 'HI'],
                ['96800', '96899', 'AS']
            ]
        ];

        // Check special prefixes first
        if (isset($specialZipPrefixes[$zipPrefix])) {
            foreach ($specialZipPrefixes[$zipPrefix] as [$rangeStart, $rangeEnd, $state]) {
                if ($zipCode >= $rangeStart && $zipCode <= $rangeEnd) {
                    return $state;
                }
            }
        }

        // Then check the general prefix mapping
        return $prefixToState[$zipPrefix] ?? null;
    }

    /**
     * Format and validate a Canadian postal code
     *
     * @param string $postalCode The postal code to format
     * @return string|false The formatted postal code or false if invalid
     */
    private function formatCanadianPostalCode($postalCode)
    {
        // Remove all spaces and convert to uppercase
        $postalCode = strtoupper(preg_replace('/\s+/', '', $postalCode));

        // Basic format check: A1A1A1 or A1A 1A1
        if (!preg_match('/^[A-Z][0-9][A-Z][0-9][A-Z][0-9]$/', $postalCode)) {
            // Try to format it if it's at least 6 characters
            if (strlen($postalCode) >= 6) {
                $postalCode = substr($postalCode, 0, 6);

                // Make sure it follows the pattern A1A1A1
                if (!preg_match('/^[A-Z][0-9][A-Z][0-9][A-Z][0-9]$/', $postalCode)) {
                    return false;
                }
            } else {
                return false;
            }
        }

        // Format as A1A 1A1
        return substr($postalCode, 0, 3) . ' ' . substr($postalCode, 3);
    }
}
