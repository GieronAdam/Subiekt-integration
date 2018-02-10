<?php
//TODO: THIS CONTROLLER EXISTS BECAUSE OF TESTS
class Ag_Subiekt_Adminhtml_SubiektbackendController extends Mage_Adminhtml_Controller_Action
{

    protected function _isAllowed()
    {
        //return Mage::getSingleton('admin/session')->isAllowed('subiekt/subiektbackend');
        return true;
    }

    public function indexAction()
    {
       $this->loadLayout();
       $this->_title($this->__("Subiekt GT"));
       $this->renderLayout();
    }

    public function orderAction()
    {
        $order =  Mage::getModel('sales/order')->loadByIncrementId('100000138');

        $model = Mage::getModel('subiekt/SubiektApi_Subiektorder');
//        Zend_Debug::dump($model->sbktSaveOrder($order));
        Zend_Debug::dump($model->sbktOrderInfo($order));
    }
}