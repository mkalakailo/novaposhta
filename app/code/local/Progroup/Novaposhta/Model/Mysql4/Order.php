<?php
class Progroup_Novaposhta_Model_Mysql4_Order extends Mage_Core_Model_Mysql4_Abstract{
	public function _construct()
	{
		$this->_init('novaposhta/order', 'id');
	}
    public function getByOrder($order_id,$var = ''){
        $table = $this->getMainTable();
        $where = $this->_getReadAdapter()->quoteInto('order_id = ?', $order_id);
        $sql = $this->_getReadAdapter()->select()->from($table)->where($where);
        $rows = $this->_getReadAdapter()->fetchAll($sql);
        foreach ($rows as $row){
            $result = array(
                'Area' => $row['area'],
                'City' => $row['city'],
                'Warehouse' => $row['warehouse'],
            );
        }
        return $result;
    }
}