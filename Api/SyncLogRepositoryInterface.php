<?php


namespace Ace\B2bConnector\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface SyncLogRepositoryInterface
{

    /**
     * Save sync_log
     * @param \Ace\B2bConnector\Api\Data\SyncLogInterface $syncLog
     * @return \Ace\B2bConnector\Api\Data\SyncLogInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Ace\B2bConnector\Api\Data\SyncLogInterface $syncLog
    );

    /**
     * Retrieve sync_log
     * @param string $syncLogId
     * @return \Ace\B2bConnector\Api\Data\SyncLogInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($syncLogId);

    /**
     * Retrieve sync_log matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Ace\B2bConnector\Api\Data\SyncLogSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete sync_log
     * @param \Ace\B2bConnector\Api\Data\SyncLogInterface $syncLog
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Ace\B2bConnector\Api\Data\SyncLogInterface $syncLog
    );

    /**
     * Delete sync_log by ID
     * @param string $syncLogId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($syncLogId);
}
