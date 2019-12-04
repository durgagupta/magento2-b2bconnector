<?php


namespace Ace\B2bConnector\Api\Data;

interface SyncLogInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const REQUEST_URL = 'request_url';
    const QUEUE_TIME = 'queue_time';
    const REQUEST = 'request';
    const RESPONSE = 'response';
    const ENTITY_TYPE = 'entity_type';
    const ENTITY_ID = 'entity_id';
    const METHOD = 'method';
    const RESPONSE_STATUS = 'response_status';
    const QUEUE_STATUS = 'queue_status';
    const SYNC_LOG_ID = 'sync_log_id';

    /**
     * Get sync_log_id
     * @return string|null
     */
    public function getSyncLogId();

    /**
     * Set sync_log_id
     * @param string $syncLogId
     * @return \Ace\B2bConnector\Api\Data\SyncLogInterface
     */
    public function setSyncLogId($syncLogId);

    /**
     * Get entity_type
     * @return string|null
     */
    public function getEntityType();

    /**
     * Set entity_type
     * @param string $entityType
     * @return \Ace\B2bConnector\Api\Data\SyncLogInterface
     */
    public function setEntityType($entityType);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Ace\B2bConnector\Api\Data\SyncLogExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Ace\B2bConnector\Api\Data\SyncLogExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Ace\B2bConnector\Api\Data\SyncLogExtensionInterface $extensionAttributes
    );

    /**
     * Get request
     * @return string|null
     */
    public function getRequest();

    /**
     * Set request
     * @param string $request
     * @return \Ace\B2bConnector\Api\Data\SyncLogInterface
     */
    public function setRequest($request);

    /**
     * Get response
     * @return string|null
     */
    public function getResponse();

    /**
     * Set response
     * @param string $response
     * @return \Ace\B2bConnector\Api\Data\SyncLogInterface
     */
    public function setResponse($response);

    /**
     * Get queue_status
     * @return string|null
     */
    public function getQueueStatus();

    /**
     * Set queue_status
     * @param string $queueStatus
     * @return \Ace\B2bConnector\Api\Data\SyncLogInterface
     */
    public function setQueueStatus($queueStatus);

    /**
     * Get queue_time
     * @return string|null
     */
    public function getQueueTime();

    /**
     * Set queue_time
     * @param string $queueTime
     * @return \Ace\B2bConnector\Api\Data\SyncLogInterface
     */
    public function setQueueTime($queueTime);

    /**
     * Get response_status
     * @return string|null
     */
    public function getResponseStatus();

    /**
     * Set response_status
     * @param string $responseStatus
     * @return \Ace\B2bConnector\Api\Data\SyncLogInterface
     */
    public function setResponseStatus($responseStatus);

    /**
     * Get entity_id
     * @return string|null
     */
    public function getEntityId();

    /**
     * Set entity_id
     * @param string $entityId
     * @return \Ace\B2bConnector\Api\Data\SyncLogInterface
     */
    public function setEntityId($entityId);

    /**
     * Get method
     * @return string|null
     */
    public function getMethod();

    /**
     * Set method
     * @param string $method
     * @return \Ace\B2bConnector\Api\Data\SyncLogInterface
     */
    public function setMethod($method);

    /**
     * Get request_url
     * @return string|null
     */
    public function getRequestUrl();

    /**
     * Set request_url
     * @param string $requestUrl
     * @return \Ace\B2bConnector\Api\Data\SyncLogInterface
     */
    public function setRequestUrl($requestUrl);
}
