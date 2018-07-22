<?php

namespace Custom\Catalog\Controller\Adminhtml\Products;

use Custom\Catalog\Controller\Adminhtml\Products;

class MassDelete extends Products
{

    protected $resultPageFactory;
    protected $resultForwardFactory;
    protected $productsFactory;

    public function __construct(
       \Magento\Backend\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $resultPageFactory,
       \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory,
       \Custom\Catalog\Model\ProductsFactory $productsFactory)
    {
       $this->resultPageFactory = $resultPageFactory;
       $this->resultForwardFactory = $resultForwardFactory;
       parent::__construct($context,$this->resultPageFactory,$this->resultForwardFactory);
       $this->productsFactory = $productsFactory;
    }
   /**
    * @return void
    */
   public function execute()
   {
      // Get IDs of the selected Products
      $productsIds = $this->getRequest()->getParam('selected');

        foreach ($productsIds as $productsId) {
            try {
               /** @var $productsModel \Custom\Catalog\Model\Products */
                $productsModel = $this->productsFactory->create();
                $productsModel->load($productsId)->delete();
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }

        if (count($productsIds)) {
            $this->messageManager->addSuccess(
                __('A total of %1 record(s) were deleted.', count($productsIds))
            );
        }

        $this->_redirect('*/*/index');
   }
}