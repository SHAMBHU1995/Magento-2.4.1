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
use Magento\Cms\Model\Template\FilterProvider;
/**
 * FormData View block
 */
class FormDataView extends \Magento\Framework\View\Element\Template
{
    /**
     * @var FormData
     */
    protected $_formdata;
    public function __construct(
        Context $context,
        FormDataFactory $formdata,
        FilterProvider $filterProvider
    ) {
        $this->_formdata = $formdata;
        $this->_filterProvider = $filterProvider;
        parent::__construct($context);
    }

    public function _prepareLayout()
    {
        // $this->pageConfig->getTitle()->set(__('Custom FormData Module View Page'));
        
        return parent::_prepareLayout();
    }

    public function getSingleData()
    {
        $id = $this->getRequest()->getParam('id');
        $formdata = $this->_formdata->create();
        $singleData = $formdata->load($id);
        if($singleData->getFormDataId() || $singleData['formdata_id'] && $singleData->getStatus() == 1){
            return $singleData;
        }else{
            return false;
        }
    }
}