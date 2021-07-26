<?php

namespace Customer\Module\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected $session;
    protected $logger;
    protected $resourceConnection;
    protected $messageManager;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Customer\Model\Session $session,
        \Customer\Module\Logger\Logger $logger,
        \Magento\Framework\App\ResourceConnection $resourceConnection,
        \Magento\Framework\Message\ManagerInterface $messageManager
    ) {
        $this->redirect = $context->getRedirect();
        $this->_session = $session;
        $this->_logger = $logger;
        $this->_resourceConnection = $resourceConnection;
        $this->messageManager = $messageManager;
    }

    public function validateFrontEndCustomer($customer)
    {
        try {
            $connection = $this->_resourceConnection->getConnection();
            $email = $customer->getEmail();
            $customerId = $customer->getId();
            $adminSql = "select * from admin_user where email = '$email'";
            $adminRow = $connection->fetchRow($adminSql);
            $adminId = $adminRow['user_id'];
            if($adminId){
                $sql = "select * from admin_user_session where user_id = '$adminId'  ORDER BY id DESC LIMIT 1";
                $row = $connection->fetchRow($sql);
                if($row['status'] == 1 ){
                    $this->_logger->info(' Active session in admin with '. $email .'');
                    $this->messageManager->addNotice(__("Can't Logged into Frontend because of active session in admin ."));
                    $this->_session->logout()
                            ->setBeforeAuthUrl($this->redirect->getRefererUrl())
                            ->setLastCustomerId($customerId);
                }else{
                    $this->_logger->info(' No active session in admin with '. $email .'');
                }
            }
        }catch(Exception $e) {
            $this->_logger->info('Message: ' .$e->getMessage());
        }
    }
    
    
}
