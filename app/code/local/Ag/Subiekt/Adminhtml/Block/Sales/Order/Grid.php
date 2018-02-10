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
            array('subiekt_response' => 'subiekt_response')
        );
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {

        $this->addColumnAfter('subiekt_response', array(
            'header' => Mage::helper('subiekt')->__('Subiekt Response'),
            'index' => 'subiekt_response',
            'width' => '70px',
            'type' => 'text',
            'filter'=>false
        ), 'increment_id');

        return parent::_prepareColumns();
    }
}