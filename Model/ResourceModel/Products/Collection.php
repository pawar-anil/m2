<?php
namespace Custom\Catalog\Model\ResourceModel\Products;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{
	protected function _construct(){
		$this->_init('Custom\Catalog\Model\Products','Custom\Catalog\Model\ResourceModel\Products');
	}
}