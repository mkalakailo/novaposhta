<?php
/**
 * Created by PhpStorm.
 * User: misch
 * Date: 26.12.2017
 * Time: 16:23
 */
class Progroup_Novaposhta_Block_Adminhtml_Warehouses extends Mage_Adminhtml_Block_Widget_Grid_Container{
    public function __construct()
    {
        parent::__construct();
        $this->removeButton('add');
    }
    protected function _construct()
    {
        parent::_construct();
        $helper = Mage::helper('novaposhta');
        $this->_blockGroup = 'novaposhta';
        $this->_controller = 'adminhtml_warehouses';
        $this->_headerText = $helper->__('Warehouses Management');

    }
}