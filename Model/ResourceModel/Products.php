<?php
namespace Custom\Catalog\Model\ResourceModel;
class Products extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb{
	protected function _construct(){
	$this->_init('custom_catalog_products', 'entity_id');
	}
}