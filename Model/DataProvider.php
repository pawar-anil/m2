<?php
namespace Custom\Catalog\Model;

use Custom\Catalog\Model\ResourceModel\Products\CollectionFactory;;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var array
     */
    protected $_loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $productsCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $productsCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $products) {
            $this->_loadedData[$products->getId()] = $products->getData();
        }
        return $this->_loadedData;
    }
}