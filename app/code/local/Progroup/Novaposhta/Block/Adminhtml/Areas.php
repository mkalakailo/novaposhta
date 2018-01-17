<?php
/**
 * Created by PhpStorm.
 * User: misch
 * Date: 12.01.2018
 * Time: 16:57
 */
class Progroup_Novaposhta_Block_Adminhtml_Areas extends Mage_Adminhtml_Block_Widget_Grid_Container{
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
        $this->_controller = 'adminhtml_areas';
        $this->_headerText = $helper->__('Areas Management');
    }
}