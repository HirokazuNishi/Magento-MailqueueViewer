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
class Rack_Mailqueueviewer_Block_Adminhtml_Mailqueueviewer extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_mailqueueviewer';
        $this->_blockGroup = 'mailqueueviewer';
        $this->_headerText = Mage::helper('mailqueueviewer')->__('Mail queue viewer');
        //$this->_addButtonLabel = Mage::helper('mailqueueviewer')->__('Add New List');
        parent::__construct();

    }
}