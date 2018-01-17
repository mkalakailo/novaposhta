<?php
class Progroup_Novaposhta_Model_Order extends Mage_Core_Model_Abstract{
	public function _construct()
	{
		parent::_construct();
		$this->_init('novaposhta/order');
	}
	public function getByOrder($order_id,$var = ''){
		return $this->_getResource()->getByOrder($order_id,$var);
	}
}