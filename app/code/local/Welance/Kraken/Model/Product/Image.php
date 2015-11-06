<?php

if(Mage::helper('core')->isModuleEnabled('Netzarbeiter_NicerImageNames')) {
  class KrakenFakeImageModel extends Netzarbeiter_NicerImageNames_Model_Image {}
} else {
  class KrakenFakeImageModel extends Mage_Catalog_Model_Product_Image {}
}

class Welance_Kraken_Model_Product_Image extends KrakenFakeImageModel
{

    /**
     * @return Mage_Catalog_Model_Product_Image
     */
    public function saveFile()
    {
        parent::saveFile();

        /* added for Kraken Image Optimization */
        Mage::dispatchEvent('catalog_product_image_save_after', array($this->_eventObject => $this));

        return $this;
    }

}
