<?php

class BootCamp_Vendors_IndexController extends Mage_Core_Controller_Front_Action
{
     
     public function indexAction()
     {
          echo '<pre>';
          //var_dump(get_class_methods(Mage::getModel('vendors/vendors')->getCollection()));
     }
     
     public function createNewVendorAction()
     {
          $vendor = Mage::getModel('vendors/bootcamp_vendor');
          
          $vendor->save();
     }
     
     public function editVendorAction()
     {
          $vendor = Mage::getModel('vendors/bootcamp_vendor');
          
          $vendor->save();
     }
     
     public function deleteVendorAction()
     {
          $vendor = Mage::getModel('vendors/bootcamp_vendor');
          
          $vendor->save();
     }
     
     public function showAllVendorsAction()
     {
          $vendors = Mage::getModel('vendors/vendors')->getCollection();
          foreach($vendors as $vendor) {
//               var_dump($vendor);
               echo '<h3>' . $vendor->getBusinessName() . '</h3>';
               echo 'Contact Name : ' . $vendor->getContactName() . '<br/>';
               echo 'Contact Email : ' . $vendor->getEmail() . '<br/>';
               echo 'Street Address 1 : ' . $vendor->getData('street_1') . '<br/>';
               echo 'Street Address 2 : ' . $vendor->getData('street_2') . '<br/>';
               echo 'Region ID : ' . $vendor->getRegionId() . '<br/>';
               echo 'Postcode : ' . $vendor->getPostcode() . '<br/>';
          }
          $this->loadLayout();
          $this->renderLayout();
     }
}