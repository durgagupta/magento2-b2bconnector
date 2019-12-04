<?php

namespace Ace\B2bConnector\Model\Request;

use Magento\Framework\App\Config\ScopeConfigInterface;

use Psr\Log\LoggerInterface;

use Magento\Framework\HTTP\ZendClient;

abstract class AbstractRequest extends ZendClient
{

    /**
     * Environment
     * @var string
     */
    protected $environment;


    /**
     * Logger
     * @var LoggerInterface
     */
    protected $logger;


    public function __construct(
        LoggerInterface $logger
    ) {
        $this->logger = $logger;

    }

    abstract protected function sendRequest($url, $method, $params);

}