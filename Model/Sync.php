<?php

namespace Ace\B2bConnector\Model;

use Ace\B2bConnector\Model\Sync\SyncAbstract as SyncAdapter;
use Magento\Framework\Message\ManagerInterface;

class Sync
{


    /**
     * @var SyncAdapter
     */
    private $syncAdapter;
    /**
     * @var ManagerInterface
     */
    private $messageManager;

    public function __construct (SyncAdapter $syncAdapter, ManagerInterface $messageManager)
    {

        $this->syncAdapter = $syncAdapter;
        $this->messageManager = $messageManager;
    }

    /**
     * Sync Data to ERP
     */
    public function syncData ($object)
    {
        try {

            $this->syncAdapter->syncData($object);

        } catch (\Exception $e) {
            $e->getMessage();
            $this->logger->error($e->getMessage());
        }

        return $this;
        /** @todo Should we return something here? */
    }

}
