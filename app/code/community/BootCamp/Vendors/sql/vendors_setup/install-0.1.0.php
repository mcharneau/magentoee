<?php

$installer = $this;

$installer->startSetup();

try{
/**
 * Create table 'bootcamp_vendor'
 */
$table = $installer->getConnection()
        ->newTable($installer->getTable('vendors/bootcamp_vendor'))
        ->addColumn('vendor_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'identity' => true,
            'nullable' => false,
            'primary'  => true,
            'unsigned' => true,
        ), 'Vendor ID')
        ->addColumn('business_name', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
            'nullable' => false,
        ), 'Contact Name')
        ->addColumn('contact_name', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
            'nullable' => false,
        ), 'Contact Name')
        ->addColumn('email', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
            'nullable' => false,
        ), 'Contact Email')
        ->addColumn('street_1', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
            'nullable' => false,
        ), 'Street Address 1')
        ->addColumn('street_2', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
            'nullable' => false,
        ), 'Street Address 2')
        ->addColumn('region_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'nullable' => false
        ), 'Region ID')
        ->addColumn('postcode', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
            'nullable' => false,
        ), 'Postcode')
        ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(            
        ), 'Created At')
        ->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        ), 'Updated At')
        ->addForeignKey(
                $installer->getFkName('vendors/bootcamp_vendor', 'region_id', 'directory/country_region', 'region_id'),
                'region_id', $installer->getTable('directory/country_region'), 'region_id',
                Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
        ->setComment('Bootcamp Vendor');
$installer->getConnection()->createTable($table); 

} catch(Exception $e) { echo $e->getMessage(); }
/**
 * create table 'bootcamp_vendor_warehouse_product'
 */
$table = $installer->getConnection()
        ->newTable($installer->getTable('vendors/bootcamp_vendor_warehouse'))
        ->addColumn('warehouse_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'identity' => true,
            'nullable' => false,
            'primary'  => true,
            'unsigned' => true,
        ), 'Warehouse ID')
        ->addColumn('contact_name', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
            'nullable' => false,
        ), 'Contact Name')
        ->addColumn('email', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
            'nullable' => false,
        ), 'Contact Email')
        ->addColumn('vendor_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'nullable' => false,
        ), 'Vendor ID')
        ->addColumn('additional_name', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'nullable' => false,
        ), 'Additional Name')
        ->addColumn('street_1', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
            'nullable' => false,
        ), 'Street Address 1')
        ->addColumn('street_2', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
            'nullable' => false,
        ), 'Street Address 2')
        ->addColumn('region_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'nullable' => false,
        ), 'Region ID')
        ->addColumn('postcode', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
            'nullable' => false,
        ), 'Postcode')
        ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(            
        ), 'Created At')
        ->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        ), 'Updated At')
        ->addForeignKey(
                $installer->getFkName('vendors/bootcamp_vendor_warehouse', 'region_id', 'directory/country_region', 'region_id'),
                'region_id', $installer->getTable('directory/country_region'), 'region_id',
                Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
        ->addForeignKey(
                $installer->getFkName('vendors/bootcamp_vendor_warehouse', 'vendor_id', 'vendors/bootcamp_vendor', 'vendor_id'),
                'vendor_id', $installer->getTable('vendors/bootcamp_vendor'), 'vendor_id',
                Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
        ->setComment('BootCamp Vendor Warehouse');
$installer->getConnection()->createTable($table); 

/**
 * create table 'bootcamp_vendor_warehouse_product'
 */
$table = $installer->getConnection()
        ->newTable($installer->getTable('vendors/bootcamp_vendor_warehouse_product'))
        ->addColumn('link_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'identity' => true,
            'nullable' => false,
            'primary'  => true,
            'unsigned' => true,
        ), 'Link ID')
        ->addColumn('warehouse_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'nullable' => false,
        ), 'Warehouse ID')
        ->addColumn('product_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'nullable' => false,
        ), 'Product ID')
        ->addIndex($installer->getIdxName('vendors/bootcamp_vendor_warehouse_product', array('product_id', 'warehouse_id')),
                array('product_id', 'warehouse_id'))
        ->addForeignKey(
                $installer->getFkName('vendors/bootcamp_vendor_warehouse_product', 'warehouse_id', 'vendors/bootcamp_vendor_warehouse', 'warehouse_id'),
                'warehouse_id', $installer->getTable('vendors/bootcamp_vendor_warehouse'), 'warehouse_id',
                Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
        ->addForeignKey(
                $installer->getFkName('vendors/bootcamp_vendor_warehouse_product', 'product_id', 'catalog/product', 'entity_id'),
                'product_id', $installer->getTable('catalog/product'), 'entity_id',
                Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
        ->setComment('BootCamp Vendor Warehouse Product');
$installer->getConnection()->createTable($table);

/**
 * create table 'bootcamp_vendor_warehouse'
 */
$table = $installer->getConnection()
        ->newTable($installer->getTable('vendors/bootcamp_assoc_vendor_warehouse'))
        ->addColumn('vendor_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'nullable' => false,
            'primary'  => true,
        ), 'Vendor ID')
        ->addColumn('warehouse_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'nullable' => false,
            'primary'  => true,  
        ), 'Warehouse ID')
        ->addIndex($installer->getIdxName('vendors/bootcamp_assoc_vendor_warehouse', array('vendor_id', 'warehouse_id')),
                array('vendor_id', 'warehouse_id'))
        ->addForeignKey(
                $installer->getFkName('vendors/bootcamp_assoc_vendor_warehouse', 'vendor_id', 'vendors/bootcamp_vendor', 'vendor_id'),
                'vendor_id', $installer->getTable('vendors/bootcamp_vendor'), 'vendor_id',
                Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
        ->addForeignKey(
                $installer->getFkName('vendors/bootcamp_assoc_vendor_warehouse', 'warehouse_id', 'vendors/bootcamp_vendor_warehouse', 'warehouse_id'),
                'warehouse_id', $installer->getTable('vendors/bootcamp_vendor_warehouse'), 'warehouse_id',
                Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
        ->setComment('BootCamp Association Vendors-to-Warehouses');
$installer->getConnection()->createTable($table);


$installer->addAttribute('catalog_product', 'vendor', array(
   'type'                     => 'varchar',
   'input'                    => 'select',
   'label'                    => 'Vendor',
   'source'                   => '',
   'global'                   => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
   'visible_on_front'         => 0,
   'is_html_allowed_on_front' => 0,
   'used_for_price_rules'     => 0,
   'apply_to'                 => 'virtual',
   'is_configurable'          => 0,
   'required'                 => 1,
   'group'                    => 'Design',
));

$installer->endSetup();