<!-- ENV -->
PAYPAL_CLIENT_ID=AcXQ0-k-ab7LtRVj2HzbhUfr9omL3mCmnyL6bG0WXXHz6ZOZixuftYAQgh7LtAsBGxgORklPGwFT62NQ
PAYPAL_SECRET=EKbt-y_aCXkJfXvbu-EO9lKaNNAOY-0iPbyqUIWH1gTG3XbzrGMKloLsGiHrZBLHymbJZuZfukgXiN_9
PAYPAL_MODE=live

<!-- Config/paypal.php -->

return [

    'client_id' => 'AcXQ0-k-ab7LtRVj2HzbhUfr9omL3mCmnyL6bG0WXXHz6ZOZixuftYAQgh7LtAsBGxgORklPGwFT62NQ',
    'secret' => 'EKbt-y_aCXkJfXvbu-EO9lKaNNAOY-0iPbyqUIWH1gTG3XbzrGMKloLsGiHrZBLHymbJZuZfukgXiN_9',

    'settings' => array(

    'mode' => 'live',
    'http.ConnectionTimeOut' => 1000,
    'log.LogEnabled' => true,
    'log.FileName' => storage_path() . '/logs/paypal.log',
    'log.LogLevel' => 'FINE'

    ),
    ];

    <!-- PaypalModel.php (vendor/paypal/rest-api-sdk-php/lib/paypal/common/paypalmodel.php)-->
<!-- command:
composer require paypal/rest-api-sdk-php -->


    private function _convertToArray($param)
    {
        $ret = array();
        foreach ($param as $k => $v) {
            if ($v instanceof PayPalModel) {
                $ret[$k] = $v->toArray();
            } else if (is_array($v) && sizeof($v) <= 0 ) {
                $ret[$k] = array();
            } else if (is_array($v)) {
                $ret[$k] = $this->_convertToArray($v);
            } else {
                $ret[$k] = $v;
            }
        }
        // If the array is empty, which means an empty object,
        // we need to convert array to StdClass object to properly
        // represent JSON String
        if (sizeof($ret) <= 0) {
            $ret = new PayPalModel();
        }
        return $ret;
    }
