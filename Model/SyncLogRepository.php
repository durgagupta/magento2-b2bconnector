<?php


namespace Ace\B2bConnector\Model;

use Ace\B2bConnector\Api\SyncLogRepositoryInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Ace\B2bConnector\Model\ResourceModel\SyncLog as ResourceSyncLog;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Ace\B2bConnector\Model\ResourceModel\SyncLog\CollectionFactory as SyncLogCollectionFactory;
use Ace\B2bConnector\Api\Data\SyncLogInterfaceFactory;
use Ace\B2bConnector\Api\Data\SyncLogSearchResultsInterfaceFactory;
use Magento\Framework\Exception\NoSuchEntityException;

class SyncLogRepository implements SyncLogRepositoryInterface
{

    protected $dataObjectHelper;

    private $storeManager;

    protected $dataSyncLogFactory;

    protected $searchResultsFactory;

    protected $dataObjectProcessor;

    protected $extensionAttributesJoinProcessor;

    protected $syncLogFactory;

    private $collectionProcessor;

    protected $resource;

    protected $extensibleDataObjectConverter;
    protected $syncLogCollectionFactory;


    /**
     * @param ResourceSyncLog $resource
     * @param SyncLogFactory $syncLogFactory
     * @param SyncLogInterfaceFactory $dataSyncLogFactory
     * @param SyncLogCollectionFactory $syncLogCollectionFactory
     * @param SyncLogSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceSyncLog $resource,
        SyncLogFactory $syncLogFactory,
        SyncLogInterfaceFactory $dataSyncLogFactory,
        SyncLogCollectionFactory $syncLogCollectionFactory,
        SyncLogSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->syncLogFactory = $syncLogFactory;
        $this->syncLogCollectionFactory = $syncLogCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataSyncLogFactory = $dataSyncLogFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Ace\B2bConnector\Api\Data\SyncLogInterface $syncLog
    ) {
        /* if (empty($syncLog->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $syncLog->setStoreId($storeId);
        } */
        
        $syncLogData = $this->extensibleDataObjectConverter->toNestedArray(
            $syncLog,
            [],
            \Ace\B2bConnector\Api\Data\SyncLogInterface::class
        );
        
        $syncLogModel = $this->syncLogFactory->create()->setData($syncLogData);
        
        try {
            $this->resource->save($syncLogModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the syncLog: %1',
                $exception->getMessage()
            ));
        }
        return $syncLogModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($syncLogId)
    {
        $syncLog = $this->syncLogFactory->create();
        $this->resource->load($syncLog, $syncLogId);
        if (!$syncLog->getId()) {
            throw new NoSuchEntityException(__('sync_log with id "%1" does not exist.', $syncLogId));
        }
        return $syncLog->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->syncLogCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Ace\B2bConnector\Api\Data\SyncLogInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Ace\B2bConnector\Api\Data\SyncLogInterface $syncLog
    ) {
        try {
            $syncLogModel = $this->syncLogFactory->create();
            $this->resource->load($syncLogModel, $syncLog->getSyncLogId());
            $this->resource->delete($syncLogModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the sync_log: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($syncLogId)
    {
        return $this->delete($this->get($syncLogId));
    }
}
