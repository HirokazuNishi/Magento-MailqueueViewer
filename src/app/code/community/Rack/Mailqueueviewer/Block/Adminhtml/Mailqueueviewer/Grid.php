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
class Rack_Mailqueueviewer_Block_Adminhtml_Mailqueueviewer_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('mailqueueviewer_grid');
        $this->setDefaultSort('message_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('core/email_queue')
            ->getResourceCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('message_id', array(
            'header'    => Mage::helper('mailqueueviewer')->__('ID'),
            'align'     =>'right',
            'width'     => '50px',
            'index'     => 'message_id',
        ));

        $this->addColumn('entity_id', array(
            'header'    => Mage::helper('mailqueueviewer')->__('Name'),
            'align'     =>'left',
            'width'     => '50px',
            'index'     => 'entity_id',
        ));

        $this->addColumn('entity_type', array(
            'header'    => Mage::helper('mailqueueviewer')->__('Description'),
            'align'     =>'left',
            'width'     => '50px',
            'index'     => 'entity_type',
        ));

        $this->addColumn('message_body', array(
            'header'    => Mage::helper('mailqueueviewer')->__('Description'),
            'align'     =>'left',
            'type'      => 'text',
            'width'     => '300px',
            'index'     => 'message_body',
            'renderer' => 'Rack_Mailqueueviewer_Block_Adminhtml_Widget_Grid_Column_Renderer_Body',
        ));
        $this->addColumn('message_parameters', array(
            'header'    => Mage::helper('mailqueueviewer')->__('Description'),
            'align'     =>'left',
            'width'     => '150px',
            'index'     => 'message_parameters',
            'renderer'  => 'Rack_Mailqueueviewer_Block_Adminhtml_Widget_Grid_Column_Renderer_Params'
        ));

        $this->addColumn('created_at', array(
            'header'    => Mage::helper('mailqueueviewer')->__('Created At'),
            'align'     => 'left',
            'width'     => '120px',
            'type'      => 'datetime',
            'index'     => 'created_at',
        ));

        $this->addColumn('processed_at', array(
            'header'    => Mage::helper('mailqueueviewer')->__('Processed At'),
            'align'     => 'left',
            'width'     => '120px',
            'type'      => 'datetime',
            'index'     => 'processed_at',
        ));



        return parent::_prepareColumns();
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('message_id');
        $this->getMassactionBlock()->setFormFieldName('message_ids');
        $this->getMassactionBlock()->setUseSelectAll(false);

        //if (Mage::getSingleton('admin/session')->isAllowed('sales/order/actions/cancel')) {
            $this->getMassactionBlock()->addItem('delete_queue', array(
                'label'=> Mage::helper('mailqueueviewer')->__('Delete'),
                'url'  => $this->getUrl('*/*/massDelete'),
            ));
        //}

        return $this;
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/index', array('_current'=>true));
    }

//    public function getRowUrl($row)
//    {
//        return $this->getUrl('*/*/edit', array('id' => $row->getGroupId()));
//    }

}