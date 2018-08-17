<?php
namespace Custom\Catalog\Model;
use Custom\Catalog\Api\CustomRepositoryInterface;
use Custom\Catalog\Api\Data\CustomDataInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\CouldNotSaveException;
use Rcason\Mq\Model\Publisher;
class CustomRepository implements CustomRepositoryInterface
{

	/**
     * @var Publisher
     */
    private $publisher;

	public function __construct(
			\Custom\Catalog\Api\Data\CustomDataInterfaceFactory $customFactory,
			\Magento\Framework\ObjectManagerInterface $objectManager,
			\Magento\Framework\Api\ExtensibleDataObjectConverter $extensibleDataObjectConverter,
			Publisher $publisher
	) {
		$this->customFactory=$customFactory;
		$this->_objectManager = $objectManager;
		$this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
		$this->publisher = $publisher;
	}

	public function update(CustomDataInterface $data){
		$id=$data->getId();





		if(!$this->_objectManager->create('Custom\Catalog\Model\Products')->load($id)->getData()){
			throw new InputException(__("Invalid ID provided",$id));
		}else{

			$customDataArray = $this->extensibleDataObjectConverter->toNestedArray($data, [], 'Custom\Catalog\Api\Data\CustomDataInterface');
			//return get_class_methods($this->extensibleDataObjectConverter);

			$this->publisher->publish('cproduct.updates',json_encode($customDataArray));
			// $customModel=$this->_objectManager->create('Custom\Catalog\Model\Products')->load($id);
			// $entityId=$customModel->getEntityId();

			// //Check if product id exists
			// if(!$entityId){
			// 	throw new InputException(__("Product ID do not exist",$data->getId()));
			// }
			// $customDataArray = $this->extensibleDataObjectConverter->toNestedArray($data, [], 'Custom\Catalog\Api\Data\CustomDataInterface');
			// //Updating custom data in the table
			// $customDataArray['entity_id']=$id;
			// //$customModel=$this->_objectManager->create('Custom\Catalog\Model\Products')->load($id);
			// //return $customDataArray;
			// $customModel->setData($customDataArray);
			// $customModel->save();
			// $customId=$customModel->getId();
		}
		//$data->setId($customId);
		return $data;
	}

	public function get($vpn){
		$products = $this->_objectManager->create('Custom\Catalog\Model\ResourceModel\Products\Collection')->addFieldToFilter('vpn',$vpn);

		if(count($products)){
			return $products->getData();
		}
		else{
			throw new InputException(__("VPN Not Found",$vpn));
		}
	}

}
