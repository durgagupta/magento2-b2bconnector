<?php


namespace Ace\B2bConnector\Model\ResourceModel\SyncLog;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Ace\B2bConnector\Model\SyncLog::class,
            \Ace\B2bConnector\Model\ResourceModel\SyncLog::class
        );
    }
}
