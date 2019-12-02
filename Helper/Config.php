<?php


namespace Ace\B2bConnector\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Config extends AbstractHelper
{


    /**
     * @param $path
     * @return mixed
     */
    public function getMapping($path)
    {
        $mapping = $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE);
        return json_decode($mapping, true);
    }

}
