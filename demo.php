<?php
/**
* Working with Magento outside of the normal routing dispatch
* flow of Mage::run()? Mage::app(); is the way to go. This
* workbench script can be a quick way to check on various
* parts of the app, including configuration, which can be
* handy when verifying custom modules.
*/
//set some PHP params for ease of debugging
ini_set('display_errors',true);
error_reporting(E_ALL | E_STRICT);
 
//process bootstrap & application hub class
require 'app/Mage.php';
 
//set developer mode
Mage::setIsDeveloperMode(true);
 
//the standard filemask for server-written files
umask(0);
 
/**
* Initialize the app and config with the default store scope
* (based on configuration data). Note that not all parts of
* the configuration are loaded, meaning that frontend- and
* adminhtml-configured event observers are not added to the
* observer lists. This can be remedied by calling
* Mage::app()->loadArea() / ->loadAreaPart() with the
* appropriate params. Note also that sessions must be
* invoked manually as well.
*/
Mage::app();
 
$objs[] = Mage::getConfig()->getModelClassName('catalog/product');
$objs[] = Mage::getConfig()->getModelClassName('customer/customer');
$objs[] = Mage::getConfig()->getResourceModelClassName('catalog/product');
$objs[] = Mage::getConfig()->getModelClassName('sales/order_item');
$objs[] = Mage::getConfig()->getBlockClassName('catalog/product_view');
$objs[] = Mage::getConfig()->getBlockClassName('cms/block');
$objs[] = Mage::getConfig()->getHelperClassName('customer/address');
$objs[] = Mage::getConfig()->getHelperClassName('sales/data');
$objs[] = Mage::getConfig()->getNode();
$objs[] = Mage::getStoreConfig();
$objs[] = Mage::getStoreConfigFlag();
 
foreach ($objs as $obj) {
Zend_Debug::dump(
$obj
);
}