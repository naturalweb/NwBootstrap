<?php
namespace NwBootstrap\Form\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\Form\Form;
use Zend\Form\Fieldset;

class BootstrapForm extends AbstractHelper
{
    public function __invoke(Form $form, $style = 'vertical')
    { 
        if ($style) {
            $form->setAttribute('class', $form->getAttribute('class') . ' form-' . $style);
        }
        $form->prepare();
        
        $output = '';
        
        $output .= $this->view->form()->openTag($form);
        
        $elements = $form->getIterator();
        foreach ($elements as $key => $element) {
            if ($element instanceof Fieldset) {
                $output .= $this->view->bootstrapCollection($element, $style);
            } else {
                $output .= $this->view->bootstrapRow($element, $style);
            }
        }
        
        $output .= $this->view->form()->closeTag($form);
        
        return $output;
    }
}