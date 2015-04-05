<?php
class Rack_Mailqueueviewer_Block_Adminhtml_Widget_Grid_Column_Renderer_Params
    extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $text = parent::_getValue($row);
        $res = '';
        foreach($text as $key => $value) {
            $res .= $key . " : " . $value . "<br/>";
        }

        return $res;
    }
}