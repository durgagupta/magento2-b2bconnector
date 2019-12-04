<?php


namespace Ace\B2bConnector\Model\Data;

use Ace\B2bConnector\Api\Data\SyncLogInterface;

class SyncLog extends \Magento\Framework\Api\AbstractExtensibleObject implements SyncLogInterface
{

    /**
     * Get sync_log_id
     * @return string|null
     */
    public function getSyncLogId()
    {
        return $this->_get(self::SYNC_LOG_ID);
    }

    /**
     * Set sync_log_id
     * @param string $syncLogId
     * @return \Ace\B2bConnector\Api\Data\SyncLogInterface
     */
    public function setSyncLogId($syncLogId)
    {
        return $this->setData(self::SYNC_LOG_ID, $syncLogId);
    }

    /**
     * Get entity_type
     * @return string|null
     */
    public function getEntityType()
    {
        return $this->_get(self::ENTITY_TYPE);
    }

    /**
     * Set entity_type
     * @param string $entityType
     * @return \Ace\B2bConnector\Api\Data\SyncLogInterface
     */
    public function setEntityType($entityType)
    {
        return $this->setData(self::ENTITY_TYPE, $entityType);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Ace\B2bConnector\Api\Data\SyncLogExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Ace\B2bConnector\Api\Data\SyncLogExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Ace\B2bConnector\Api\Data\SyncLogExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get request
     * @return string|null
     */
    public function getRequest()
    {
        return $this->_get(self::REQUEST);
    }

    /**
     * Set request
     * @param string $request
     * @return \Ace\B2bConnector\Api\Data\SyncLogInterface
     */
    public function setRequest($request)
    {
        return $this->setData(self::REQUEST, $request);
    }

    /**
     * Get response
     * @return string|null
     */
    public function getResponse()
    {
        return $this->_get(self::RESPONSE);
    }

    /**
     * Set response
     * @param string $response
     * @return \Ace\B2bConnector\Api\Data\SyncLogInterface
     */
    public function setResponse($response)
    {
        return $this->setData(self::RESPONSE, $response);
    }

    /**
     * Get queue_status
     * @return string|null
     */
    public function getQueueStatus()
    {
        return $this->_get(self::QUEUE_STATUS);
    }

    /**
     * Set queue_status
     * @param string $queueStatus
     * @return \Ace\B2bConnector\Api\Data\SyncLogInterface
     */
    public function setQueueStatus($queueStatus)
    {
        return $this->setData(self::QUEUE_STATUS, $queueStatus);
    }

    /**
     * Get queue_time
     * @return string|null
     */
    public function getQueueTime()
    {
        return $this->_get(self::QUEUE_TIME);
    }

    /**
     * Set queue_time
     * @param string $queueTime
     * @return \Ace\B2bConnector\Api\Data\SyncLogInterface
     */
    public function setQueueTime($queueTime)
    {
        return $this->setData(self::QUEUE_TIME, $queueTime);
    }

    /**
     * Get response_status
     * @return string|null
     */
    public function getResponseStatus()
    {
        return $this->_get(self::RESPONSE_STATUS);
    }

    /**
     * Set response_status
     * @param string $responseStatus
     * @return \Ace\B2bConnector\Api\Data\SyncLogInterface
     */
    public function setResponseStatus($responseStatus)
    {
        return $this->setData(self::RESPONSE_STATUS, $responseStatus);
    }

    /**
     * Get entity_id
     * @return string|null
     */
    public function getEntityId()
    {
        return $this->_get(self::ENTITY_ID);
    }

    /**
     * Set entity_id
     * @param string $entityId
     * @return \Ace\B2bConnector\Api\Data\SyncLogInterface
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * Get method
     * @return string|null
     */
    public function getMethod()
    {
        return $this->_get(self::METHOD);
    }

    /**
     * Set method
     * @param string $method
     * @return \Ace\B2bConnector\Api\Data\SyncLogInterface
     */
    public function setMethod($method)
    {
        return $this->setData(self::METHOD, $method);
    }

    /**
     * Get request_url
     * @return string|null
     */
    public function getRequestUrl()
    {
        return $this->_get(self::REQUEST_URL);
    }

    /**
     * Set request_url
     * @param string $requestUrl
     * @return \Ace\B2bConnector\Api\Data\SyncLogInterface
     */
    public function setRequestUrl($requestUrl)
    {
        return $this->setData(self::REQUEST_URL, $requestUrl);
    }
}
