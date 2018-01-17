<?php
class Progroup_Novaposhta_Block_Order extends Mage_Core_Block_Template{
    public function getCustomData(){
        $model = Mage::getModel('novaposhta/order');
        return $model->getByOrder($this->getOrder()->getId());
    }
    public function getOrder()
    {
        return Mage::registry('current_order');
    }
}