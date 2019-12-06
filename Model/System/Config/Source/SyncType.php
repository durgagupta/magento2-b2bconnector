<?php

namespace Ace\B2bConnector\Model\System\Config\Source;

use Magento\Framework\Option\ArrayInterface;


class SyncType implements ArrayInterface
{

    const TYPE_QUEUE_INSTANCE = 1;
    const TYPE_QUEUE_PENDING  = 2;
    const TYPE_QUEUE_COMPLETE = 3;

    const TYPE_QUEUE_SUCCESS = 4;
    const TYPE_QUEUE_ERROR   = 5;


    const SYNC_METHOD_POST      = "POST";
    const SYNC_METHOD_GET       = "GET";
    const SYNC_METHOD_PUT       = "PUT";
    const SYNC_METHOD_DELETE    = "DELETE";

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
            self::TYPE_QUEUE_INSTANCE => __('Instance sync'),
            self::TYPE_QUEUE_PENDING => __('Sync Pending'),
            self::TYPE_QUEUE_COMPLETE => __('Sync Complete'),

            self::TYPE_QUEUE_SUCCESS => __('SUCCESS'),
            self::TYPE_QUEUE_ERROR => __('ERROR')
        ];
    }

}