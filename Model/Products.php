<?php
namespace Custom\Catalog\Model;

class Products extends \Magento\Framework\Model\AbstractModel {

	protected function _construct(){
		$this-> _init('Custom\Catalog\Model\ResourceModel\Products');
	}
}