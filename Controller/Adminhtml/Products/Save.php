<?php

namespace Custom\Catalog\Controller\Adminhtml\Products;

use Custom\Catalog\Controller\Adminhtml\Products;

class Save extends Products
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
      $isPost = $this->getRequest()->getPost();

      if ($isPost) {
         $productsModel = $this->productsFactory->create();
         $id = $this->getRequest()->getParam('entity_id');
         if ($id) {
            try {
              $productsModel->load($id);
            } catch (LocalizedException $e) {
               $this->messageManager->addErrorMessage(__('This Products no longer exists.'));
            return $resultRedirect->setPath('*/*/');
            }
         }
         $formData = $this->getRequest()->getPostValue();
         //print_r($formData);
         if ($formData['form_key']) {
            unset($formData['form_key']);
         }
         if (!$formData['entity_id']) {
            unset($formData['entity_id']);
         }

         //$formData=array('product_id'=>'4','copyright_info'=>'3','vpn'=>'3','sku'=>'3');
         //print_r($formData);die;
         $productsModel->setData($formData);
         //print_r($productsModel->getData());die;

         try {
            // Save Products
            $productsModel->save();

            // Display success message
            $this->messageManager->addSuccess(__('The Products has been saved.'));

            // Check if 'Save and Continue'
            if ($this->getRequest()->getParam('back')) {
               $this->_redirect('*/*/edit', ['id' => $productsModel->getId(), '_current' => true]);
               return;
            }

            // Go to grid page
            $this->_redirect('*/*/');
            return;
         } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
         }

         $this->_getSession()->setFormData($formData);
         $this->_redirect('*/*/edit', ['id' => $Id]);
      }
   }
}