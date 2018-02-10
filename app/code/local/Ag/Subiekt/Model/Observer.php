<?php

class Ag_Subiekt_Model_Observer
{
    public function exportOrder(Varien_Event_Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $sbktObj = Mage::getModel('subiekt/SubiektApi_Subiektorder');
        $response = $sbktObj->sbktSaveOrder($order);
        Mage::log($response,null,'logObserver.log',true);
        die();
    }
}