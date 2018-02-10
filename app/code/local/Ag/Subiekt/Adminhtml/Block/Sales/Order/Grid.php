<?php

class Ag_Subiekt_Adminhtml_Block_Sales_Order_Grid extends Mage_Adminhtml_Block_Sales_Order_Grid
{
    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel($this->_getCollectionClass());
        $select = $collection->getSelect();
        $select->joinLeft(array
        (
            'si' => Mage::getModel('core/resource')->getTableName('sales/order')),
            'si.entity_id=main_table.entity_id',
            array('apiresponse' => 'apiresponse')
        );
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {

        $this->addColumnAfter('apisent', array(
            'header' => Mage::helper('orderapi')->__('Api Status'),
            'index' => 'apisent',
            'width' => '70px',
            'type' => 'text',
            'filter'=>false
        ), 'external_order_id');

        $this->addColumnAfter('apiresponse', array(
            'header' => Mage::helper('orderapi')->__('SAP Response'),
            'index' => 'apiresponse',
            'width' => '70px',
            'type' => 'text',
            'filter'=>false
        ), 'apisent');

        return parent::_prepareColumns();
    }
}