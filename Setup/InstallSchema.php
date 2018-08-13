<?php
namespace Custom\Catalog\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
class InstallSchema implements InstallSchemaInterface{
	public function install(SchemaSetupInterface $setup,ModuleContextInterface $context){
		$setup->startSetup();

		$table = $setup->getConnection()
		->newTable($setup->getTable('custom_catalog_products'))
		->addColumn(
			'entity_id',
			\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,null,
			['identity' => true, 'unsigned' => true, 'nullable' =>false, 'primary' => true],
			'Entity ID'
		)
		->addColumn(
			'product_id',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,100,
			['identity' => false, 'unsigned' => true, 'nullable' =>false, 'primary' => true],
			'Entity ID'
		)
		->addColumn(
			'copyright_info',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			250,
			[],
			'Copy Write Information'
		)
		->addColumn(
			'vpn',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			100,
			[],
			'Vendor Product Number'
		)
		->addColumn(
			'sku',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			100,
			[],
			'SKU'
		)
		->addIndex(
			$setup->getIdxName(
				'custom_catalog_products',
				['entity_id'],
				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE
			),
			['entity_id'],
			['type' => \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE]
		)

		->addIndex(
			$setup->getIdxName(
				'custom_catalog_products',
				['product_id'],
				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE
			),
			['product_id'],
			['type' => \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE]
		)

		->addIndex($setup->getIdxName('custom_catalog_products',['entity_id']),['entity_id'])
		->addIndex($setup->getIdxName('custom_catalog_products',['vpn']),['vpn'])
		->addIndex($setup->getIdxName('custom_catalog_products',['sku']),['sku'])

		->setComment('Custom Catalog Products Table');
		$setup->getConnection()->createTable($table);

		$setup->endSetup();
	}
}