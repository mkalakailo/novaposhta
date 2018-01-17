<?php
/**
 * Created by PhpStorm.
 * User: misch
 * Date: 26.12.2017
 * Time: 16:23
 */
class Progroup_Novaposhta_Block_Adminhtml_Cities extends Mage_Adminhtml_Block_Widget_Grid_Container{
    public function __construct()
    {
        parent::__construct();
        $this->removeButton('add');
    }
    protected function _construct()
    {
        $helper = Mage::helper('novaposhta');
        $this->_blockGroup = 'novaposhta';
        $this->_controller = 'adminhtml_cities';
        $this->_headerText = $helper->__('Cities Management');
        $this->_addButton('button_id', array(
            'label'     => Mage::helper('adminhtml')->__('Update Cities'),
            'onclick'   => 'jsfunction(this.id)',
            'class'     => 'update'
        ), 0, 100, 'header');
        parent::_construct();

    }
}