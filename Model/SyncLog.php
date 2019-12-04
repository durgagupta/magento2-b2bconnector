<?php


namespace Ace\B2bConnector\Model;

use Ace\B2bConnector\Api\Data\SyncLogInterface;
use Magento\Framework\Api\DataObjectHelper;
use Ace\B2bConnector\Api\Data\SyncLogInterfaceFactory;
use Magento\Framework\ObjectManagerInterface;
use Ace\B2bConnector\Model\System\Config\Source\SyncType;

class SyncLog extends \Magento\Framework\Model\AbstractModel
{

    protected $dataObjectHelper;

    protected $_eventPrefix = 'ace_b2bconnector_sync_log';
    protected $sync_logDataFactory;
    /**
     * @var ObjectManagerInterface
     */
    private $objectManager;


    /**
     * SyncLog constructor.
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param SyncLogInterfaceFactory $sync_logDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param ResourceModel\SyncLog $resource
     * @param ResourceModel\SyncLog\Collection $resourceCollection
     * @param ObjectManagerInterface $objectManager
     * @param array $data
     */
    public function __construct (
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        SyncLogInterfaceFactory $sync_logDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Ace\B2bConnector\Model\ResourceModel\SyncLog $resource,
        \Ace\B2bConnector\Model\ResourceModel\SyncLog\Collection $resourceCollection,
        ObjectManagerInterface $objectManager,
        array $data = []
    ) {
        $this->sync_logDataFactory = $sync_logDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
        $this->objectManager = $objectManager;
    }

    /**
     * Retrieve sync_log model with sync_log data
     * @return SyncLogInterface
     */
    public function getDataModel ()
    {
        $sync_logData = $this->getData();

        $sync_logDataObject = $this->sync_logDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $sync_logDataObject,
            $sync_logData,
            SyncLogInterface::class
        );

        return $sync_logDataObject;
    }

    /**
     * @throws \Exception
     */
    public function syncData ()
    {
        $this->save();
        if ($this->getData(SyncLogInterface::QUEUE_STATUS)
                == SyncType::TYPE_QUEUE_INSTANCE) {

            $this->doApiCall();
        }
    }


    public function doApiCall() {

        $requestInterface = $this->objectManager->create("\Ace\B2bConnector\Model\Request\Rest");
        $response = $requestInterface->sendRequest(
            $this->getData(SyncLogInterface::REQUEST_URL),
            $this->getData(SyncLogInterface::METHOD),
            $this->getData(SyncLogInterface::REQUEST)
        );

        $status = $requestInterface->getLastResponse()->getStatus();

        $this->setData(SyncLogInterface::QUEUE_STATUS, SyncType::TYPE_QUEUE_COMPLETE);
        $this->setData(SyncLogInterface::RESPONSE , $response->getBody());
        $this->setData(SyncLogInterface::RESPONSE_STATUS , $status);

        $this->save();

        $this->setData("response", $response);
    }



}
