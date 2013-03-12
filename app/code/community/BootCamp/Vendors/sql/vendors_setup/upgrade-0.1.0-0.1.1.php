 <?php

$model = Mage::getModel('vendors/vendors')->addData(array(
    'business_name' => 'Cents',
    'contact_name'  => 'Jack',
    'email'         => 'values@symbols.com',
    'street_1'      => '15323 hell road',
    'street_2'      => '54 fuck this lane',
    'region_id'     => 34,
    'postcode'      => '24564'
    ))->save();

$model = Mage::getModel('vendors/vendors')->addData(array(
    'business_name' => 'Dollars',
    'contact_name'  => 'Jacob',
    'email'         => 'words@address.com',
    'street_1'      => '21323 shalt road',
    'street_2'      => '6543 dairy lane',
    'region_id'     => 54,
    'postcode'      => '24567'
    ))->save();

$model = Mage::getModel('vendors/vendors')->addData(array(
    'business_name' => 'Euros',
    'contact_name'  => 'Jake',
    'email'         => 'money@chance.com',
    'street_1'      => '43 lars road',
    'street_sele2'      => '654 tin lane',
    'region_id'     => 6,
    'postcode'      => '24634'
    ))->save();
?>
