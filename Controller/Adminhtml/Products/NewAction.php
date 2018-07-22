<?php

namespace Custom\Catalog\Controller\Adminhtml\Products;

use Custom\Catalog\Controller\Adminhtml\Products;

class NewAction extends Products
{
   /**
     * Create new Products action
     *
     * @return void
     */
   public function execute()
   {
      $this->_forward('edit');
   }
}