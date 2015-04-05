<?php
class Rack_Mailqueueviewer_Block_Adminhtml_Widget_Grid_Column_Renderer_Body
    extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $truncateLength = 250;
        // stringLength() is for legacy purposes
        if ($this->getColumn()->getStringLimit()) {
            $truncateLength = $this->getColumn()->getStringLimit();
        }
        if ($this->getColumn()->getTruncate()) {
            $truncateLength = $this->getColumn()->getTruncate();
        }
        $text = Mage::helper('core/string')->truncate(parent::_getValue($row), $truncateLength);
        //if ($this->getColumn()->getEscape()) {
            $text = $this->escapeHtml($text);
        //}
        if ($this->getColumn()->getNl2br()) {
            $text = nl2br($text);
        }
        return $text;
    }
}

