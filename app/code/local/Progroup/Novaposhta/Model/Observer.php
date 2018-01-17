<?php
/**
 * Created by PhpStorm.
 * User: misch
 * Date: 28.12.2017
 * Time: 18:23
 */
class Progroup_Novaposhta_Model_Observer extends Mage_Core_Model_Abstract{
    public function saveShipping($observer){
        $iOrderId = Mage::getSingleton('checkout/session')->getLastRealOrderId();
        $oOrder = Mage::getModel('sales/order')->loadByIncrementId($iOrderId);
        $oOrder->getShippingDescription();
        $request = $observer->getRequest();
        $pickup = $request->getParam('shipping_novaposhta',false);
        if($pickup){
            Mage::getSingleton('checkout/session')->setArea($pickup['area'])
                ->setCity($pickup['city'])
                ->setWarehouse($pickup['warehouse']);
        }
    }
    public function saveOrderAfter($evt){
        $connection = Mage::getSingleton('core/resource')->getConnection('core_write');
        $order = $evt->getOrder();
        $area = Mage::getSingleton('checkout/session')->getArea();
        $sqlqury ="Select Description FROM novaposhta_areas WHERE ref = '{$area}'";
        $rez_area = $connection->fetchAll($sqlqury);
        $city = Mage::getSingleton('checkout/session')->getCity();
        $sqlqury_city ="Select Description FROM novaposhta_cities WHERE Ref = '{$city}'";
        $rez_city = $connection->fetchAll($sqlqury_city);
        $warehouse = Mage::getSingleton('checkout/session')->getWarehouse();
        $sqlqury_ware ="Select Description FROM novaposhta_warehouses WHERE Ref = '{$warehouse}'";
        $rez_warehouse = $connection->fetchAll($sqlqury_ware);
        $pickupModel = Mage::getModel('novaposhta/order');
            $pickupModel->setOrderId($order->getId());
            $pickupModel->setArea($rez_area[0]['Description']);
            $pickupModel->setCity($rez_city[0]['Description']);
            $pickupModel->setWarehouse($rez_warehouse[0]['Description']);
            $pickupModel->save();
    }
    public function saveQuoteAfter($evt){
        $quote = $evt->getQuote();
        $area = Mage::getSingleton('checkout/session')->getArea();
        $city = Mage::getSingleton('checkout/session')->getCity();
        $warehouse = Mage::getSingleton('checkout/session')->getWarehouse();
        $pickupModel = Mage::getModel('novaposhta/quote');
            $pickupModel->setQuoteId($quote->getId());
            $pickupModel->setArea($area);
            $pickupModel->setCity($city);
            $pickupModel->setWarehouse($warehouse);
            $pickupModel->save();
    }

    public function downloadData()
    {
        Mage::log("download");
        if ((bool)Mage::helper('novaposhta')->getStoreConfig('api_key') !== false &&
            Mage::helper('novaposhta')->getStoreConfig('active') == "1")
        {
            $helper = Mage::helper('novaposhta');
            $cities = $helper->getCities(true);
            $warehouses = $helper->getWarehouses(true);
            $areas = $helper->getAreas(true);
            $resource = Mage::getSingleton('core/resource');
            $write = $resource->getConnection('core_write');
            $table_cities = $resource->getTableName('novaposhta_cities');
            $table_warehouses = $resource->getTableName('novaposhta_warehouses');
            $table_areas = $resource->getTableName('novaposhta_areas');
            $write->truncateTable($table_cities);
            $write->truncateTable($table_warehouses);
            $write->truncateTable($table_areas);

            foreach ($cities as $item) {
                $model = Mage::getModel('novaposhta/cities');

                $model->setData(array(
                    'Description'   => $item['Description'],
                    'DescriptionRu' => $item['DescriptionRu'],
                    'Ref'           => $item['Ref'],
                    'Delivery1'     => $item['Delivery1'],
                    'Area'          => $item['Area'],
                    'CityID'        => $item['CityID'],
                ))->save();
            }
            foreach ($warehouses as $item) {
                $model = Mage::getModel('novaposhta/warehouses');
                $model->setData(array(
                    'SiteKey'           => $item['SiteKey'],
                    'Description'       => $item['Description'],
                    'DescriptionRu'     => $item['DescriptionRu'],
                    'Phone'             => $item['Phone'],
                    'TypeOfWarehouse'   => $item['TypeOfWarehouse'],
                    'Ref'               => $item['Ref'],
                    'Number'            => $item['Number'],
                    'CityRef'           => $item['CityRef'],
                    'CityDescription'   => $item['CityDescription'],
                    'CityDescriptionRu' => $item['CityDescriptionRu'],
                ))->save();
            }
            foreach ($areas as $item) {
                $model = Mage::getModel('novaposhta/areas');
                $model->setData(array(
                    'description'       => $item['Description'],
                    'areas_center'     => $item['AreasCenter'],
                    'ref'               => $item['Ref'],
                ))->save();
            }
        }
    }
}