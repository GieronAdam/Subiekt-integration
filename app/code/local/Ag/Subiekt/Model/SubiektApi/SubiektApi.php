<?php
class Ag_Subiekt_Model_SubiektApi_SubiektApi extends Ag_Subiekt_Model_SubiektApi_Connection
{
    private $helper;
    public function __construct()
    {
        parent::__construct();
        $this->helper = Mage::helper('subiekt');
    }

    public function sbktAddOrder($request)
    {
        $uri = '/anything';
        $response = $this->_callApi($this->_getApiAddress(), $uri, 'GET', $request);
        $response = json_decode($response);
        return $response;
    }

    public function sbktMakesaledoc($api_key, $data = array())
    {
        $data ='{
                "api_key": "pc0hv61itbxbhtXYujsfdjer774kfsdasd",
                "data": {
                    "order_ref": "ZK 151/01/2018"
                }';
        $response = '{
                     "state": "success",
                        "data": {
                            "doc_ref": "PA 233/01/2018"
                        }
                    }';
        $fail = '{
                  "state": "fail",
                  "message": "Nie można utworzyć dokumentu sprzedaży. Brakuje produktów na magazynie!",
                  "data": {
                        "order_ref": "ZK 151/01/2018"
                    }
                }';
    }

    public function sbktGetOrderPdf($api_key, $data = array())
    {
        $data ='{
                     "api_key": "pc0hv61itbxbhtXYujsfdjer774kfsdasd",
                     "data": {
                            "order_ref": "ZK 151/01/2018"
                     }
                }';
    }

    public function sbktgetOrderInfo($request)
    {
        $uri = '/anything';
        $response = $this->_callApi($this->_getApiAddress(), $uri, 'GET', $request);

        return  json_decode($response);
    }

    public function sbktGetOrderState($api_key, $data = array())
    {
        $data ='{
                    "api_key": "pc0hv61itbxbhtXYujsfdjer774kfsdasd",
                    "data": {
                        "doc_ref": "ZK 151/01/2018"
                    }
                }';
    }

    public function sbktGetDocInfo($api_key, $data = array())
    {
        $data ='{
                    "api_key": "pc0hv61itbxbhtXYujsfdjer774kfsdasd",
                    "data": {
                         "doc_ref": "FZ 3139/MAG/12/2017"
                    }
                }';
        $response = '{
                        "state": "success",
                        "data": {
                            "products": [
                                {
                                    "name": "SNOW PEAK Kubek DOUBLE WALL MUG 300 Folfing handle",
                                    "code": "691688171597",
                                    "qty": "1.0000",
                                    "price": "139.3000"
                                },
                                {
                                    "name": "SNOW PEAK Kubek DOUBLE WALL WARE H300",
                                    "code": "691688720283",
                                    "qty": "1.0000",
                                    "price": "122.5100"
                                },
                                {
                                    "name": "SNOW PEAK Pokrywka 300",
                                    "code": "4960589171859",
                                    "qty": "3.0000",
                                    "price": "58.7800"
                                },
                                {
                                    "name": "Koszty transportu",
                                    "code": "111",
                                    "qty": "1.0000",
                                    "price": "20.0000"
                                }
                            ],
                            "fiscal_state": 0,
                            "accounting_state": 0,
                            "reference": "1302/MAG/2017",
                            "comments": "",
                            "customer": {
                                "ref_id": "762-147-05-85",
                                "company_name": null,
                                "tax_id": "762-147-05-85",
                                "fullname": "Waterfall",
                                "email": "",
                                "city": "Warszawa",
                                "post_code": "02-797",
                                "address": "Klimczaka 22 D/3 ",
                                "phone": "",
                                "is_company": true
                            },
                            "doc_ref": "FZ 3139/MAG/12/2017",
                            "doc_type": "FZ",
                            "amount": "340.5900",
                            "state": 1,
                            "date_of_delivery": null,
                            "is_exists": true,
                            "gt_id": 171820
                        }
                    }';
    }

    public function sbktGetPdf()
    {
        $data ='{
                    "api_key": "pc0hv61itbxbhtXYujsfdjer774kfsdasd",
                    "data": {
                        "doc_ref": "ZK 151/01/2018"
                }';
    }

    public function sbktAddProduct()
    {
        $data = '{
                    "api_key": "pc0hv61itbxbhtXYujsfdjer774kfsdasd",
                    "data": {
                           "name": "LEKI Rękawice FUSE S MF TOUCH r.9 black",
                           "code": "4028173073672",
                           "qty": "1.0000",
                           "price": "415.6500"
                
                    }
                }';
    }

    public function sbktUpdateProduct()
    {
        $data = '{
                    "api_key": "pc0hv61itbxbhtXYujsfdjer774kfsdasd",
                    "data": {
                           "name": "LEKI Rękawice FUSE S MF TOUCH r.9 black",
                           "code": "4028173073672",
                           "qty": "1.0000",
                           "price": "415.6500"
                
                    }
                }';
    }

    public function sbktGetProductInfo()
    {
        $data ='{
                    "api_key": "pc0hv61itbxbhtXYujsfdjer774kfsdasd",
                    "data": {
                           "code": "4028173073672"
                    }
                }';
    }

}
