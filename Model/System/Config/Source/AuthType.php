<?php

namespace Ace\ErpConnector\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;


class AuthType implements ArrayInterface
{

    const TYPE_NONE = 1;
    const TYPE_BASIC_AUTH = 2;
    const TYPE_SOAP_AUTH = 3;


    /**
     * @return array
     */
    public function getAllOptions()
    {
        $options = [];
        foreach (self::getOptionArray() as $value => $text) {
            $options[] = [
                'value' => $value,
                'label' => $text
            ];
        }
        return $options;
    }


    /**
     * @return array
     */
    public function toOptionArray()
    {
        return self::getOptionArray();
    }


    /**
     * @return array
     */
    public static function getOptionArray()
    {
        return [
            self::TYPE_NONE => __('No authenticaton'),
            self::TYPE_BASIC_AUTH => __('Basic authentication'),
            self::TYPE_SOAP_AUTH => __('SOAP authentication')
        ];
    }

}