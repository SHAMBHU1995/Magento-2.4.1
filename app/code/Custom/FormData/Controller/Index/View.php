<?php
/**
 * @category   Custom
 * @package    Custom_FormData
 * @author     shambhusinghdce@gmail.com
 * @copyright  This file was generated by using Module Creator(http://code.vky.co.in/magento-2-module-creator/) provided by VKY <viky.031290@gmail.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Custom\FormData\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\NotFoundException;
use Custom\FormData\Block\FormDataView;

class View extends \Magento\Framework\App\Action\Action
{
	protected $_formdataview;

	public function __construct(
        Context $context,
        FormDataView $formdataview
    ) {
        $this->_formdataview = $formdataview;
        parent::__construct($context);
    }

	public function execute()
    {
    	if(!$this->_formdataview->getSingleData()){
    		throw new NotFoundException(__('Parameter is incorrect.'));
    	}
    	
        $this->_view->loadLayout();
        $this->_view->getLayout()->initMessages();
        $this->_view->renderLayout();
    }
}
