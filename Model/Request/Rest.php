<?php

namespace Ace\B2bConnector\Model\Request;

use Ace\ErpConnector\Model\System\Config\Source\AuthType;
use Ace\B2bConnector\Model\Request\AbstractRequest;

class Rest extends AbstractRequest
{


    public function __construct (
        \Psr\Log\LoggerInterface $logger
    ) {
        parent::__construct($logger);
    }

    /**
     * {@inheritdoc}
     */
//    public function send($method, $action, $data)
//    {
//        $this->logger->info('Sending '.$method.': '. $action);
//
//        $uri = $action;
//        try {
//            $this->logger->error($uri);
//            $this->logger->error($data);
//            $this->post($uri, $data);
//        } catch (\Exception $e) {
//            $this->logger->error($e->getMessage());
//        }
//
//
//        $this->logger->info("Body");
//       // $this->logger->info($this->getBody());
//    }


    public function sendRequest ($url, $method = 'GET', $params = [])
    {
        $this->setUri($url);

        $this->setConfig(array(
                'maxredirects' => 0,
                'timeout' => 30
            )
        );

        $method = strtoupper($method);
        switch ($method) {
            case 'DELETE':
            case 'GET':
                $this->setParameterGet($params);
                break;
            case 'PUT':
                if (isset($params['xml'])) {
                    $this->setRawData($params['xml']);
                }
                break;
            case 'POST':
                $this->setParameterPost($params);
                break;
            default:
                throw new \Exception(__('HTTP method is not supported'));
        }
        return $this->request($method);
    }
}