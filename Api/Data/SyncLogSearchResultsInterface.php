<?php


namespace Ace\B2bConnector\Api\Data;

interface SyncLogSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get sync_log list.
     * @return \Ace\B2bConnector\Api\Data\SyncLogInterface[]
     */
    public function getItems();

    /**
     * Set entity_type list.
     * @param \Ace\B2bConnector\Api\Data\SyncLogInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
