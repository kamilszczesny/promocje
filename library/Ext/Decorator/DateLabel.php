<?php 
class Ext_Decorator_DateLabel extends Zend_Form_Decorator_Abstract
{
    protected $_placement = 'PREPEND';
 
    public function render($content)
    {
        if (null === ($element = $this->getElement())) {
            return $content;
        }
        if (!method_exists($element, 'getLabel')) {
            return $content;
        }
 
        $label = $element->getLabel() . ':';
        return $this->renderLabel($content, $label);
    }
 
    public function renderLabel($content, $label)
    {
        $placement = $this->getPlacement();
        $separator = $this->getSeparator();
 
        switch ($placement) {
            case 'APPEND':
                return $content . $separator . $label;
            case 'PREPEND':
            default:
                return $label . $separator . $content.'<script type="text/javascript">AnyTime.picker( "data",{format: "%z-%c-%d %H:%i", firstDOW: 1 } );</script>';
        }
    }
}