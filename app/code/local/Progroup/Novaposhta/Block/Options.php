<?php
/**
 * Created by PhpStorm.
 * User: misch
 * Date: 10.01.2018
 * Time: 16:54
 */
class Progroup_Novaposhta_Block_Options extends  Mage_Checkout_Block_Onepage_Shipping_Method_Available {

    public function __construct(){
        $this->setTemplate('novaposhta/options.phtml');

        $data_area = Mage::getModel('novaposhta/areas')->getCollection();
        Mage::register('areas',$data_area->getData());
    }
}