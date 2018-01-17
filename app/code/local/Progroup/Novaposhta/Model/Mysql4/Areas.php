<?php
/**
 * Created by PhpStorm.
 * User: misch
 * Date: 12.01.2018
 * Time: 13:45
 */
class Progroup_Novaposhta_Model_Mysql4_Areas extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("novaposhta/areas", "id");
    }
}