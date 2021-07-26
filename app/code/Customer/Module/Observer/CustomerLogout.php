<?php

namespace Customer\Module\Observer;

use Magento\Framework\Event\ObserverInterface;

class CustomerLogout implements ObserverInterface
{
    protected $logger;

    public function __construct(
        \Customer\Module\Logger\Logger $logger
    ) {
        $this->_logger = $logger;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
        $this->_logger->info($customer->getEmail() . ' Logged out from frontend .');
    }
}