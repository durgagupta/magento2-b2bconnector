<?php


namespace Ace\B2bConnector\Model\ResourceModel;

class SyncLog extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('ace_b2bconnector_sync_log', 'sync_log_id');
    }
}
