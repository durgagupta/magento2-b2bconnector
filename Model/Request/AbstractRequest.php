<?php

namespace Ace\B2bConnector\Model\Transport;

use Magento\Framework\App\Config\ScopeConfigInterface;

use Psr\Log\LoggerInterface;
use Magento\Framework\HTTP\Client\Curl;

abstract class AbstractRequest extends Curl
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

    abstract protected function send($method, $action, array $data);

}