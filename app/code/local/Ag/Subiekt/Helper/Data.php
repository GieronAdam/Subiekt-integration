<?php
class Ag_Subiekt_Helper_Data extends Mage_Core_Helper_Abstract
{

    public function saveAttr($attrName, $attrValue, $orderObject)
    {
        $orderObject->setData($attrName,$attrValue);
        $orderObject->getResource()->saveAttribute($orderObject,$attrName);
        return $orderObject;
    }

    public function getItemsCollection($order)
    {
        $products = array();
        foreach($order->getAllItems() as $item)
        {
            $array = array(
                'code'=>$item->getSku(),
                'qty' => $item->getQtyOrdered(),
                'price' => number_format($item->getData('row_total_incl_tax'),2),
                'price_before_discount' => number_format($item->getData('base_row_total_incl_tax'),2),
                'name' => $item->getName(),
                'id_store' => '1'
            );
            array_push($products,$array);
        }
        array_push($products,$this->deliveryItem($order));
        return $products;
    }

    public function deliveryItem($order)
    {
        return  array(
            "ean" => "SHIPPING",
            "code" => $order->getShippingMethod(),
            "qty" => 1,
            "price" => number_format($order->getData('shipping_amount'),2),
            "price_before_discount" => number_format($order->getData('shipping_incl_tax'),2),
            "name" => $order->getData('shipping_description'),
            "id_store" => "1"
        );
    }

}
	 