<?php
namespace Tutorial\Thu\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;

class InstallSchema Implements InstallSchemaInterface  {
	public function install(SchemaSetupInterface $setup, ModuleContextInterface $context){
		$installer = $setup;
		$installer->startSetup();
		$table = $installer->getConnection()->newTable(
			$installer->getTable('FAQ')
		)-> addColumn(
			'id',
			\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
			null,
			['identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true],
			'Group ID'
		)-> addColumn(
			'title',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			255,
			['nullable' => false],
			'Group Tittle'
		)-> addColumn(
			'description',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			'2M',
			['nullable' => false],
			'Group Description'
		)-> addColumn(
			'image',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			255,
			['nullable' => true],
			'Group Image'
		)-> addColumn(
			'status',
			\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
			null,
			['nullable' => false, 'default' => 0],
			'Group Status'
		)-> addColumn(
			'create_at',
			\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
			null,
			['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
			'Group Created Time'
		)-> addColumn(
			'updated_at',
			\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
			null,
			['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
			'Group Updated Time'
		)-> setComment(
			'Manage FAQ Table'
		);
		$installer->getConnection()->createTable($table);
		$installer->endSetup();
	}
}
?>