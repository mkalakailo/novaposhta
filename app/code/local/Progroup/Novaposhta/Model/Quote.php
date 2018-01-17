<?php
class Progroup_Novaposhta_Model_Quote extends Mage_Core_Model_Abstract{
	public function _construct()
	{
		parent::_construct();
		$this->_init('novaposhta/quote');
	}
	public function getByQuote($quote_id,$city = '',$area = '',$warehouse = ''){
        return $this->_getResource()->getByQuote($quote_id,$area,$city,$warehouse);
	}
}