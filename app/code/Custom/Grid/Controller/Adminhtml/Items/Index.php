<?php
/**
 * Copyright © 2015 Custom. All rights reserved.
 */

namespace Custom\Grid\Controller\Adminhtml\Items;

class Index extends \Custom\Grid\Controller\Adminhtml\Items
{
    /**
     * Items list.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Custom_Grid::grid');
        $resultPage->getConfig()->getTitle()->prepend(__('Custom Items'));
        $resultPage->addBreadcrumb(__('Custom'), __('Custom'));
        $resultPage->addBreadcrumb(__('Items'), __('Items'));
        return $resultPage;
    }
}
