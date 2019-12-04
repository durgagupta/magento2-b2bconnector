<?php

namespace Ace\B2bConnector\Api\Request;


interface RequestInterface
{


    public function get($action, array $arguments);


    public function post($action, array $arguments);


    public function put($action, array $arguments);


    public function delete($action, array $arguments);


//    public function getResponseName();
//
//
//    public function setResponseName($responseName);

}