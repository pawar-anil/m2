<?php
namespace Custom\Catalog\Controller\Adminhtml;

class Products extends \Magento\Backend\App\Action
{
	protected $resultPageFactory;
	protected $resultForwardFactory;

	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory,
		\Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory)
	{
		$this->resultPageFactory = $resultPageFactory;
		$this->resultForwardFactory = $resultForwardFactory;
		parent::__construct($context);
	}

	protected function _isAllowed()
	{
		return $this->_authorization->isAllowed('Custom_Catalog::products');
	}

	protected function _initAction()
	{
		$this->_view->loadLayout();
		$this->_setActiveMenu('Custom_Catalog::Custom_products')->_addBreadcrumb(__('Custom Catalog'),__('Products'));
		return $this;
	}

 	public function execute(){
		if ($this->getRequest()->getQuery('ajax')) {
			$resultForward = $this->resultForwardFactory->create();
			$resultForward->forward('grid');
			return $resultForward;
		}
		$resultPage = $this->resultPageFactory->create();
		$resultPage->setActiveMenu('Custom_Catalog::Custom_products');
		$resultPage->getConfig()->getTitle()->prepend(__('Products'));
		$resultPage->addBreadcrumb(__('CustomCatalog'), __('CustomCatalog'));
		$resultPage->addBreadcrumb(__('Products'),__('Products'));
		return $resultPage;
	}
}