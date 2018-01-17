<?php
class Progroup_Novaposhta_Adminhtml_NovaposhtaController extends Mage_Adminhtml_Controller_Action{

    public function citiesAction(){
        $this->loadLayout();
//        $this->_setActiveMenu('novaposhta');
//        $helper = Mage::helper('novaposhta');
//        $this->getLayout()->getBlock('head')->setTitle($helper->__('Cities Management'));
//        $contentBlock = $this->getLayout()->createBlock('novaposhta/adminhtml_cities');
//        $this->_addContent($contentBlock);
        $this->renderLayout();
    }
    public function warehousesAction(){
        $this->loadLayout();
//        $this->_setActiveMenu('novaposhta');
//        $helper = Mage::helper('novaposhta');
//        $this->getLayout()->getBlock('head')->setTitle($helper->__('Warehouses Management'));
//        $contentBlock = $this->getLayout()->createBlock('novaposhta/adminhtml_warehouses');
//        $this->_addContent($contentBlock);
        $this->renderLayout();
    }
    public function areasAction(){
        $this->loadLayout();
//        $this->_setActiveMenu('novaposhta');
//        $helper = Mage::helper('novaposhta');
//        $this->getLayout()->getBlock('head')->setTitle($helper->__('Areas Management'));
//        $contentBlock = $this->getLayout()->createBlock('novaposhta/adminhtml_areas');
//        $this->_addContent($contentBlock);
        $this->renderLayout();
    }
}