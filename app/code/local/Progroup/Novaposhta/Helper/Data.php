<?php
class Progroup_Novaposhta_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getStoreConfig($key)
    {
        return Mage::getStoreConfig('carriers/novaposhta/' . $key);
    }

    public function getCities($api = false)
    {
        if ($api == true) {
            $cities = Mage::getSingleton('novaposhta/api_client')->getConnection()->getCities(0);
            if (isset($cities['data'])) {
                return $cities['data'];
            }
        } else {
            $cities = Mage::getModel('novaposhta/novaposhta_cities')->getCollection();
            if ($cities->count() > 0) {
                return $cities->toArray()['items'];
            }
        }
    }
    public function getWarehouses($api = false)
    {
        if ($api == true) {
            $warehouses = Mage::getSingleton('novaposhta/api_client')->getConnection()->getWarehouses(0);
            if (isset($warehouses['data'])) {
                return $warehouses['data'];
            }
        }
    }
    public function findWarehouses($cityRef, $api = false){
        $data = array();
        if($api == true){
            $warehouses = Mage::getSingleton('novaposhta/api_client')->getConnection()->getWarehouses($cityRef);
            if(isset($warehouses['data']) && count($warehouses['data'])>0){
                $data = array_merge($data, $warehouses['data']);
            }
        }
        else{
            $warehouses = Mage::getModel('novaposhta/novaposhta_warehouses')->getCollection();
            $warehouses->addFieldToFilter('CityRef',$cityRef);
            $warehouses->getSelect()->order('CAST(Number as UNSIGNED) asc');
            if($warehouses->count()>0){
                $data = array_merge($data, $warehouses->toArray()['items']);
            }
        }
        return $data;
    }
    public function getAreas($api = false){
        if ($api == true) {
            $area = Mage::getSingleton('novaposhta/api_client')->getConnection()->getAreas(0);
            if (isset($area['data'])) {
                return $area['data'];
            }
        }
    }
}
	 