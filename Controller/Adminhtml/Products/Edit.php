<?php

namespace Custom\Catalog\Controller\Adminhtml\Products;

use Custom\Catalog\Controller\Adminhtml\Products;

class Edit extends Products
{
    protected $resultPageFactory;
    protected $resultForwardFactory;
    protected $productsFactory;
    protected $_coreRegistry = null;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory,
        \Custom\Catalog\Model\ProductsFactory $productsFactory,
        \Magento\Framework\Registry $registry)
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context,$this->resultPageFactory,$this->resultForwardFactory);
        $this->productsFactory = $productsFactory;
        $this->_coreRegistry = $registry;
    }

   /**
     * @return void
     */
   public function execute()
   {
      $ProductsId = $this->getRequest()->getParam('id');
        /** @var \Custom\Catalog\Model\Products $model */
        $model = $this->productsFactory->create();

        if ($ProductsId) {
            $model->load($ProductsId);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This Products no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }

        // Restore previously entered form data from session
        $data = $this->_session->getProductsData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        $this->_coreRegistry->register('custom_catalog_products', $model);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Custom_Catalog::custom_catalog');
        $resultPage->getConfig()->getTitle()->prepend(__('Products'));

        return $resultPage;
   }
}