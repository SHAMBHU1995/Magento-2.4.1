<?php

namespace Customer\Module\Observer;

use Magento\Framework\Event\ObserverInterface;

class AdminLogin implements ObserverInterface
{
    protected $logger;
    protected $authSession;
    protected $helper;

    public function __construct(
        \Customer\Module\Logger\Logger $logger,
        \Magento\Backend\Model\Auth\Session $authSession,
        \Customer\Module\Helper\Data $helper
    ) {
        $this->_logger = $logger;
        $this->authSession = $authSession;
        $this->_helper = $helper;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        try {
            $customer = $this->authSession->getUser();
            $this->_logger->info($customer->getEmail() . ' Logged into Admin .');
        }catch(Exception $e) {
            $this->_logger->info('Message: ' .$e->getMessage());
        }
    }
}