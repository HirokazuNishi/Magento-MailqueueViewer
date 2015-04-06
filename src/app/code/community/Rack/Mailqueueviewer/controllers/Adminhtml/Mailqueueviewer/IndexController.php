<?php
/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to info@principle-works.jp so we can send you a copy immediately.
 *
 * @category   Marketing
 * @package    Rack_Mailqueueviewer
 * @copyright  Copyright (c) 2015 Veriteworks Inc. (http://principle-works.jp/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Rack_Mailqueueviewer_Adminhtml_Mailqueueviewer_IndexController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();

        $this->_title($this->__('Email Queue'));
        $this->_setActiveMenu('system');

        $block = $this->getLayout()->createBlock('mailqueueviewer/adminhtml_mailqueueviewer');
        $this->_addContent($block);

        $this->renderLayout();
    }

    public function massDeleteAction()
    {
        $messageIds = $this->getRequest()->getParam('message_ids', null);
        if (is_array($messageIds)) {
            $model = Mage::getModel('core/email_queue');
            try {
                foreach ($messageIds as $id) {
                    $model->load($id);
                    $model->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('mailqueueviewer')->__('Queue was successfully deleted.'));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/');
    }
}