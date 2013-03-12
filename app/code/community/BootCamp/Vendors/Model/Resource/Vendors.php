<?php

class BootCamp_Vendors_Model_Resource_Vendors extends Mage_Core_Model_Resource_Db_Abstract
{
     protected function _construct()
     {
          $this->_init('vendors/bootcamp_vendor', 'vendor_id');
     }
}
?>
