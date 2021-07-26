<?php
/**
 * @category   Custom
 * @package    Custom_FormData
 * @author     shambhusinghdce@gmail.com
 * @copyright  This file was generated by using Module Creator(http://code.vky.co.in/magento-2-module-creator/) provided by VKY <viky.031290@gmail.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Custom\FormData\Block;

use Magento\Framework\View\Element\Template\Context;
use Custom\FormData\Model\FormDataFactory;
/**
 * FormData List block
 */
class FormDataListData extends \Magento\Framework\View\Element\Template
{
    /**
     * @var FormData
     */
    protected $_formdata;
    public function __construct(
        Context $context,
        FormDataFactory $formdata
    ) {
        $this->_formdata = $formdata;
        parent::__construct($context);
    }

    public function _prepareLayout()
    {
        // $this->pageConfig->getTitle()->set(__('Custom FormData Module List Page'));
        
        if ($this->getFormDataCollection()) {
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'custom.formdata.pager'
            )->setAvailableLimit(array(5=>5,10=>10,15=>15))->setShowPerPage(true)->setCollection(
                $this->getFormDataCollection()
            );
            $this->setChild('pager', $pager);
            $this->getFormDataCollection()->load();
        }
        return parent::_prepareLayout();
    }

    public function getFormDataCollection()
    {
        $page = ($this->getRequest()->getParam('p'))? $this->getRequest()->getParam('p') : 1;
        $pageSize = ($this->getRequest()->getParam('limit'))? $this->getRequest()->getParam('limit') : 5;

        $formdata = $this->_formdata->create();
        $collection = $formdata->getCollection();
        $collection->addFieldToFilter('status','1');
        //$formdata->setOrder('formdata_id','ASC');
        $collection->setPageSize($pageSize);
        $collection->setCurPage($page);

        return $collection;
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
}