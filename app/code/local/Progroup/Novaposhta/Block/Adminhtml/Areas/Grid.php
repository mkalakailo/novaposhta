<?php
class Progroup_Novaposhta_Block_Adminhtml_Areas_Grid extends Mage_Adminhtml_Block_Widget_Grid{
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('novaposhta/areas')->getCollection();
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
            'index' => 'description',
            'type' => 'text',
        ));
        $this->addColumn('Ref', array(
            'header' => $helper->__('Ref'),
            'index' => 'ref',
            'filter' => false,
            'sortable' => false,
            'type' => 'text',
        ));
        $this->addColumn('AreasCenter', array(
            'header' => $helper->__('AreasCenter'),
            'index' => 'areas_center',
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