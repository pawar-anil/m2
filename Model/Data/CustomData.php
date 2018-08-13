<?php
namespace Custom\Catalog\Model\Data;

use \Magento\Framework\Api\AttributeValueFactory;

/**
 * Class Custom Data
 * @SuppressWarnings(PHPMD.ExcessivePublicCount)
 */
class CustomData extends \Magento\Framework\Api\AbstractExtensibleObject implements
\Custom\Catalog\Api\Data\CustomDataInterface
{

	/**
	 * Get Id.
	 *
	 * @return int|null
	 */
	public function getId()
	{
		return $this->_get(self::ID);
	}

	/**
	 * Set Id.
	 *
	 * @param int $id
	 * @return $this
	 */
	public function setId($id = null)
	{
		return $this->setData(self::ID, $id);
	}

	/**
	 * Get Product Id.
	 *
	 * @return int|null
	 */
	public function getProductId()
	{
		return $this->_get(self::PRODUCT_ID);
	}

	/**
	 * Set Product Id.
	 *
	 * @param String $product_id
	 * @return $this
	 */
	public function setProductId($product_id = null)
	{
		return $this->setData(self::PRODUCT_ID, $product_id);
	}


	/**
	 * Get vpn.
	 *
	 * @return String|null
	 */
	public function getVpn()
	{
		return $this->_get(self::ENTITY_VPN);
	}

	/**
	 * Set vpn.
	 *
	 * @param String $vpn
	 * @return $this
	 */
	public function setVpn($vpn = null)
	{
		return $this->setData(self::ENTITY_VPN, $vpn);
	}

	/**
	 * Get copyright_info.
	 *
	 * @return String|null
	 */
	public function getCopyrightInfo()
	{
		return $this->_get(self::ENTITY_COPYRIGHT_INFO);
	}

	/**
	 * Set copyright_info.
	 *
	 * @param String $copyright_info
	 * @return $this
	 */
	public function setCopyrightInfo($copyright_info = null)
	{
		return $this->setData(self::ENTITY_COPYRIGHT_INFO, $copyright_info);
	}




}