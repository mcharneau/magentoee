<?php

class BootCamp_Vendors_Model_Resource_Setup extends Mage_Catalog_Model_Resource_Setup
{
     public function startSetup()
     {
          $this->getConnection()->startSetup();
          return $this;
     }
     
     public function endSetup()
     {
          $this->getConnection()->endSetup();
          return $this;
     }
}