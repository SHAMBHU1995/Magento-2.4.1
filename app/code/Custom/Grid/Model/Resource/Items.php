<?php
/**
 * Copyright © 2015 Custom. All rights reserved.
 */

namespace Custom\Grid\Model\Resource;

class Items extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Model Initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('custom_grid_items', 'id');
    }
}
