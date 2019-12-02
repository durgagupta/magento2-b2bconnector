<?php
/**
 * Ace Extensions
 *
 * @category   Ace
 * @package    Ace_Import
 * @author     Durga Shankar Gupta (dsguptas@gmail.com)
 * @copyright  Copyright (c) 2019 Ace Extensions ( http://aceextensions.com )
 */

namespace Ace\B2bConnector\Model\Mapper;

use Psr\Log\LoggerInterface;
use Ace\B2bConnector\Api\MapperInterface;

abstract class MapperAbstract implements MapperInterface
{


    protected $logger;



    public function __construct(
        LoggerInterface $logger
    ) {

        $this->logger = $logger;
    }



    abstract public function map($data);



    public function getLogger()
    {
        return $this->logger;
    }

}
