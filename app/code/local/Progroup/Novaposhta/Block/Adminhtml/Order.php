<?php
class Progroup_Novaposhta_Block_Adminhtml_Order extends Mage_Adminhtml_Block_Sales_Order_Abstract
{
    public function getCustomData()
    {
        $model = Mage::getModel('novaposhta/order');
        return $model->getByOrder($this->getOrder()->getId());
    }
}