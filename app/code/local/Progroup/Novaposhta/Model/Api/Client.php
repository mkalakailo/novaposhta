<?php
/**
 * Created by PhpStorm.
 * User: misch
 * Date: 29.12.2017
 * Time: 12:41
 */
class Progroup_Novaposhta_Model_Api_Client
{
    protected $_client;
    protected function _getApiKey()
    {
        $key = Mage::helper('novaposhta')->getStoreConfig('api_key');
        if (!trim($key)) {
            throw new Exception('No API key configured');
        }
        return $key;
    }
    protected function _getClient()
    {
        if (!$this->_client) {
            $this->_client = new Progroup_Novaposhta_Model_Api_Api2(
                $this->_getApiKey(),
                'ua',
                FALSE,
                'curl'
            );
        }
        return $this->_client;
    }
    public function getConnection(){
        return $this->_getClient();
    }
}