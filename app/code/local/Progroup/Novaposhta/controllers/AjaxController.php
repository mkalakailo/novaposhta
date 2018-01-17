<?php
/**
 * Created by PhpStorm.
 * User: misch
 * Date: 11.01.2018
 * Time: 12:20
 */
class Progroup_Novaposhta_AjaxController extends Mage_Core_Controller_Front_Action{
    public function getCityAction()
    {
        $city = $this->getRequest()->getParam('city_name');
        $data = Mage::getModel('novaposhta/warehouses')->getCollection()->addFieldToFilter('CityRef', $city);
        foreach ($data as $datum) {
            $warehouses[] = $datum->getData();
            $ref = $datum['Ref'];

        }
        $responce = array('success' => 1, 'warehouses' => $warehouses, 'ref' =>$ref);
        $this->_prepareDataJSON($responce);
    }
    public function getAreaAction()
    {
        $area_ref = $this->getRequest()->getParam('area_ref');
        $data = Mage::getModel('novaposhta/cities')->getCollection()->addFieldToFilter('Area', $area_ref);
        foreach ($data as $datum) {
            $cities[] = $datum->getData();
            $ref[] = $datum['Ref'];

        }
        $responce = array('success' => 1, 'cities' => $cities, 'ref' => $ref);
        $this->_prepareDataJSON($responce);
    }

    /**
     * Prepare JSON formatted data for response to client
     *
     * @param $response
     * @return Zend_Controller_Response_Abstract
     */
    protected function _prepareDataJSON($response)
    {
        $this->getResponse()->setHeader('Content-type', 'application/json', true);
        return $this->getResponse()->setBody(Mage::helper('core')->jsonEncode($response));
    }

}