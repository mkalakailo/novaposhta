<?php
class Progroup_Novaposhta_Model_Mysql4_Cities extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("novaposhta/cities", "id");
    }
}