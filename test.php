<?php
/**
 * Requires libcurl
 */

$curl = curl_init();

$payload = array(
  "to_address" => array(
    "name" => "Pramod Thomson",
    "company" => "string",
    "address1" => "30 Clearview Dr",
    "address2" => "string",
    "city" => "Rock Springs",
    "province_code" => "WY",
    "postal_code" => "82901",
    "country_code" => "US",
    "phone" => "string",
    "email" => "string",
    "is_residential" => true
  ),
  "return_address" => array(
    "name" => "Pramod Thomson",
    "company" => "string",
    "address1" => "30 Clearview Dr",
    "address2" => "string",
    "city" => "Rock Springs",
    "province_code" => "WY",
    "postal_code" => "82901",
    "country_code" => "US",
    "phone" => "string",
    "email" => "string",
    "is_residential" => true
  ),
  "is_return" => false,
  "weight_unit" => "lbs",
  "weight" => 0.6,
  "length" => 9,
  "width" => 12,
  "height" => 1,
  "size_unit" => "cm",
  "items" => array(
    array(
      "description" => "Two pair of socks",
      "sku" => "SKU123",
      "quantity" => 2,
      "value" => 10,
      "currency" => "CAD",
      "country_of_origin" => "CN",
      "hs_code" => "123456",
      "manufacturer_name" => "Acme Clothing Inc.",
      "manufacturer_address1" => "123 Manufacturing Blvd",
      "manufacturer_city" => "Toronto",
      "manufacturer_province_code" => "ON",
      "manufacturer_postal_code" => "M5V 2H1",
      "manufacturer_country_code" => "CA"
    )
  ),
  "package_type" => "Parcel",
  "postage_types" => array(),
  "signature_confirmation" => true,
  "insured" => true,
  "region" => NULL,
  "tax_identifier" => array(
    "tax_type" => "IOSS",
    "number" => "IM1234567890",
    "issuing_authority" => "GB"
  )
);

curl_setopt_array($curl, [
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer lyuIwPalBwOrRYIMkFRaCbhLK81cYQUOuu6IGF2naZlzQIpdSQduK5faXfB7",  // Replace with your API token
    "Content-Type: application/json"
  ],
  CURLOPT_POSTFIELDS => json_encode($payload),
  CURLOPT_URL => "https://sandbox.stallionexpress.ca/api/v4/rates",  // Use sandbox endpoint
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
]);

$response = curl_exec($curl);
$error = curl_error($curl);

curl_close($curl);

if ($error) {
  echo "cURL Error #:" . $error;
} else {
  echo $response;
}
?>
