<?php
class Progroup_Novaposhta_Model_Mysql4_Quote extends Mage_Core_Model_Mysql4_Abstract{
	public function _construct()
	{
		$this->_init('novaposhta/quote', 'id');
	}
}