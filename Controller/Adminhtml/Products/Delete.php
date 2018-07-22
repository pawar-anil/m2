<?php
namespace Custom\Catalog\Controller\Adminhtml\Products;

use Custom\Catalog\Controller\Adminhtml\Products;

class Delete extends Products
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
      $ProductsId = (int) $this->getRequest()->getParam('id');

      if ($ProductsId) {
         /** @var $productsModel \Custom\Catalog\Model\Products */
         $productsModel = $this->productsFactory->create();
         $productsModel->load($ProductsId);

         // Check this Products exists or not
         if (!$productsModel->getId()) {
            $this->messageManager->addError(__('This Product no longer exists.'));
         } else {
               try {
                  // Delete Products
                  $productsModel->delete();
                  $this->messageManager->addSuccess(__('The Product has been deleted.'));

                  // Redirect to grid page
                  $this->_redirect('*/*/');
                  return;
               } catch (\Exception $e) {
                   $this->messageManager->addError($e->getMessage());
                   $this->_redirect('*/*/edit', ['id' => $productsModel->getId()]);
               }
            }
      }
   }
}