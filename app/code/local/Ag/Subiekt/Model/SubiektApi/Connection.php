<?php
/**
 * Created by PhpStorm.
 * User: adamgieron
 * Date: 10.02.2018
 * Time: 12:46
 */

class Ag_Subiekt_Model_SubiektApi_Connection
{
    private $apikey;
    private $apiaddress;

    public function __construct()
    {
        $this->_setApiAddres();
        $this->_setApiKey();
    }

    private function _setApiAddres()
    {
        return $this->apiaddress = Mage::getStoreConfig('subiekt/api_configuration/apiaddress');
    }

    public function _getApiAddress()
    {
        return $this->apiaddress;
    }

    private function _setApiKey()
    {
        return $this->apikey = Mage::getStoreConfig('subiekt/api_configuration/apikey');
    }

    public function _getApiKey()
    {
        return $this->apikey;
    }

    public function _callApi($url,$uri,$method,$data)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url.$uri,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "Content-Type: application/json"
            ),
        ));
        try {
            $response = curl_exec($curl);
            curl_close($curl);
            return $response;
        } catch(Exception $error)
        {
            curl_close($curl);
            return curl_error($curl).PHP_EOL.$error->getMessage();
        }
    }

}