<?php

namespace Customer\Module\Observer;

use Magento\Framework\Event\ObserverInterface;

class CustomerLogin implements ObserverInterface
{
    protected $logger;
    protected $helper;

    public function __construct(
        \Customer\Module\Logger\Logger $logger,
        \Customer\Module\Helper\Data $helper
    ) {
        $this->_logger = $logger;
        $this->_helper = $helper;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        try {
            $customer = $observer->getEvent()->getCustomer();
            $this->_logger->info($customer->getEmail() . ' Logged into frontend .');
            $this->_helper->validateFrontEndCustomer($customer);
        }catch(Exception $e) {
            $this->_logger->info('Message: ' .$e->getMessage());
        }
    }
}