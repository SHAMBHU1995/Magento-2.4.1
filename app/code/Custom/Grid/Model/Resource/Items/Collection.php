<?php
/**
 * Copyright © 2015 Custom. All rights reserved.
 */

namespace Custom\Grid\Model\Resource\Items;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Custom\Grid\Model\Items', 'Custom\Grid\Model\Resource\Items');
    }
}
