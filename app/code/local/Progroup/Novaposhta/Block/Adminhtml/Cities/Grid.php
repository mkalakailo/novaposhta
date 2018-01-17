<?php
class Progroup_Novaposhta_Block_Adminhtml_Cities_Grid extends Mage_Adminhtml_Block_Widget_Grid{
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('novaposhta/cities')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
    protected function _prepareColumns()
    {
        $helper = Mage::helper('novaposhta');
        $this->addColumn('id', array(
            'header' => $helper->__('ID'),
            'index' => 'id'
        ));
        $this->addColumn('Description', array(
            'header' => $helper->__('Description'),
            'index' => 'Description',
            'type' => 'text',
        ));
        $this->addColumn('Ref', array(
            'header' => $helper->__('Ref'),
            'index' => 'Ref',
            'filter' => false,
            'sortable' => false,
            'type' => 'text',
        ));
        return parent::_prepareColumns();
    }
    public function getRowUrl($model)
    {
        return 'javascript:void(0)';
    }
}