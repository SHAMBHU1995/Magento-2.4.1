<?php
/**
 * Copyright © 2015 Custom. All rights reserved.
 */

namespace Custom\Grid\Controller\Adminhtml\Items;

class NewAction extends \Custom\Grid\Controller\Adminhtml\Items
{

    public function execute()
    {
        $this->_forward('edit');
    }
}
