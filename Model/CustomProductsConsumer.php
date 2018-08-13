<?php

namespace Custom\Catalog\Model;

class CustomProductsConsumer implements \Rcason\Mq\Api\ConsumerInterface
{
    protected $logger;
    protected $_objectManager;

    /**
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->logger = $logger;
        $this->_objectManager = $objectManager;
    }

    /**
     * {@inheritdoc}
     */
    public function process($data)
    {


        try {
            $data = json_decode($data,true);
            $id=$data['id'];
            $this->logger->info('custom Product update processed:'.$id);
            $customModel=$this->_objectManager->create('Custom\Catalog\Model\Products')->load($id);

            $data['entity_id']=$id;
            $customModel->setData($data);
            $customModel->save();
         } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
         }
    }
}