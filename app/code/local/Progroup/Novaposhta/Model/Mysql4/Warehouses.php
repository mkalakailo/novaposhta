<?php
class Progroup_Novaposhta_Model_Mysql4_Warehouses extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("novaposhta/warehouses", "id");
    }
}