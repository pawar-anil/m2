<?php
namespace Custom\Catalog\Api\Data;

/**
 * Custom Data interface.
 * @api
 */
interface CustomDataInterface extends \Magento\Framework\Api\CustomAttributesDataInterface
{
	/**#@+
	 * Constants defined for keys of the data array. Identical to the name of the getter in snake case
	 */
	const ID = 'id';

	const ENTITY_ID = 'entity_id';
	const ENTITY_VPN = 'vpn';
	const ENTITY_COPYRIGHT_INFO = 'copyright_info';

	/**#@-*/

	/**
	 * Get Id.
	 *
	 * @return int|null
	 */
	public function getId();

	/**
	 * Set Id.
	 *
	 * @param int $id
	 * @return $this
	 */
	public function setId($id = null);

	/**
	 * Get entityId Id.
	 *
	 * @return int|null
	 */
	public function getEntityId();

	/**
	 * Set entityId Id.
	 *
	 * @param int $entityId
	 * @return $this
	 */
	public function setEntityId($entityId = null);

    /**
     * Get Product vpn
     *
     * @return string
     */
    public function getVpn();

    /**
     * Set Product vpn
     *
     * @param string $vpn
     * @return $this
     */
    public function setVpn($vpn);


    /**
     * Get Product copyright_info
     *
     * @return string
     */
    public function getCopyrightInfo();

    /**
     * Set Product copyright_info
     *
     * @param string $copyright_info
     * @return $this
     */
    public function setCopyrightInfo($copyright_info);

}