<?php

namespace Custom\Catalog\Api;

interface CustomRepositoryInterface
{
	/**
	 * Update custom Api.
	 *
	 * @param \Custom\Catalog\Api\Data\CustomDataInterface $entity
	 * @return \Custom\Catalog\Api\Data\CustomDataInterface
	 * @throws \Magento\Framework\Exception\LocalizedException
	 */
	public function update(\Custom\Catalog\Api\Data\CustomDataInterface $entity);

	/**
	 * Get custom Api.
	 *
	 * @param int $id
	 * @return \Custom\Catalog\Api\Data\CustomDataInterface
	 * @throws \Magento\Framework\Exception\LocalizedException
	 */
	public function get($id);

}