<?php

namespace Ace\B2bConnector\Model\Request;

use Ace\ErpConnector\Model\System\Config\Source\AuthType;
use Ace\B2bConnector\Model\Transport\AbstractRequest;

class Rest extends AbstractRequest
{


    public function __construct(
        \Psr\Log\LoggerInterface $logger
    ) {
        parent::__construct($logger);
    }

    /**
     * {@inheritdoc}
     */
    protected function send($method, $action, array $data = [])
    {
        $this->logger->info('Sending '.$method.': '. $action);

        $uri = $action;
        $this->{$method}($uri, $data);
    }
}