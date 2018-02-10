<?php
/**
 * Created by PhpStorm.
 * User: adamgieron
 * Date: 10.02.2018
 * Time: 12:28
 */

class Ag_Subiekt_Model_SubiektApi_Subiektorder extends Ag_Subiekt_Model_SubiektApi_SubiektApi
{
    private $helper;

    public function __construct()
    {
        parent::__construct();
        $this->helper = Mage::helper('subiekt');

    }

    public function sbktSaveOrder($order)
    {
        $address_no = $order->getShippingAddress()->getData('street');
        $address_no = preg_split("/\\r\\n|\\r|\\n/",$address_no,null);
        unset($address_no[0]);
        $sbkt = new Varien_Object();
        $sbkt->setApikey($this->_getApiKey());
        $sbkt->setData('data',
            array(
                'comments' => 'Płatność: '.$order->getPayment()->getMethod().' Wysyłka: '.$order->getData('shipping_description'),
                'reference' => $order->getIncrementId(),
                'create_product_if_not_exists' => null,
                'amount' => number_format($order->getGrandTotal(),2),
                'pay_type' => $order->getPayment()->getMethod(),
                'customer' => array(
                    "firstname" => $order->getCustomerFirstname(),
                    "lastname" => $order->getCustomerLastname(),
                    "email" => $order->getCustomerEmail(),
                    "address" => preg_replace("/\\r\\n|\\r|\\n/",'',preg_replace('/[[:digit:]]/','', $order->getShippingAddress()->getData('street'))),
                    "address_no" => implode('/',$address_no),
                    "city" => $order->getShippingAddress()->getData('city'),
                    "post_code" => $order->getBillingAddress()->getData('postcode'),
                    "phone" => $order->getBillingAddress()->getData('telephone'),
                    "ref_id" => $order->getCustomerEmail(),
                    "is_company" => $company = $order->getBillingAddress()->getData('company') == NULL ? false : true,
                    "company_name" => $order->getBillingAddress()->getData('company'),
                    "tax_id" => $order->getBillingAddress()->getData('vat_id')
                ),
                'products' => $this->helper->getItemsCollection($order)
            )
        );

       $response = $this->sbktAddOrder($sbkt->toArray());
        if ($response->state == 'success'){
            $this->helper->saveAttr('subiekt_response',$response->data->order_ref,$order);
        } else {
            $this->helper->saveAttr('subiekt_response','Failed',$order);
        }
        return $response->json;
    }

    public function sbktOrderInfo()
    {
        $sbkt = new Varien_Object();
        $sbkt->setApikey($this->_getApiKey());
        $sbkt->setData('data',array(

        ));
    }
}
