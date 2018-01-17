<?php
/**
 * Created by PhpStorm.
 * User: misch
 * Date: 12.01.2018
 * Time: 13:37
 */
$installer = $this;
$installer->startSetup();
$table_areas = $installer->getTable('novaposhta/areas');

$table = $installer->getConnection()
    ->newTable($table_areas)
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
    ))
    ->addColumn('description', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
    ))
    ->addColumn('ref', Varien_Db_Ddl_Table::TYPE_TEXT, '255', array(
        'nullable'  => false,
    ))
    ->addColumn('areas_center', Varien_Db_Ddl_Table::TYPE_TEXT, '255', array(
        'nullable'  => false,
    ));
$installer->getConnection()->createTable($table);
$installer->endsetup();