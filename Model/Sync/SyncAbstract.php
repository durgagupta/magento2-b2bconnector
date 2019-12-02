<?php

namespace Ace\B2bConnector\Model\Sync;

use Psr\Log\LoggerInterface;
use Ace\B2bConnector\Api\MapperInterface;


abstract class SyncAbstract
{

    /**
     *
     * @var LoggerInterface
     */
    protected $logger;

    /**
     *
     * @var MapperInterface
     */
    protected $mapper;


    /**
     * SyncAbstract constructor.
     * @param LoggerInterface $logger
     * @param MapperInterface $mapper
     */
    public function __construct (LoggerInterface $logger, MapperInterface $mapper)
    {
        $this->logger = $logger;
        $this->mapper = $mapper;
    }

    /**
     * Sync data
     */
    abstract public function syncData ($modleObjct);

    /**
     * Mapper getter
     *
     * @return MapperInterface
     */
    public function getMapper ()
    {
        return $this->mapper;
    }


    /**
     * Get logger instance
     *
     * @return LoggerInterface
     */
    public function getLogger ()
    {
        return $this->logger;
    }

}
