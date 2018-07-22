<?php
namespace Custom\Catalog\Controller\Adminhtml\Products;

class Grid extends \Custom\Catalog\Controller\Adminhtml\Products
{
	public function execute()
	{
	$this->_view->loadLayout(false);
	$this->_view->renderLayout();
	}
}