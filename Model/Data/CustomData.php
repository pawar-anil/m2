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
	 * Get Entity Id.
	 *
	 * @return int|null
	 */
	public function getEntityId()
	{
		return $this->_get(self::ENTITY_ID);
	}

	/**
	 * Set Entity Id.
	 *
	 * @param int $entityId
	 * @return $this
	 */
	public function setEntityId($entityId = null)
	{
		return $this->setData(self::ENTITY_ID, $entityId);
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