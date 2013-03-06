<?php
namespace NwBootstrap\Form\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\Form\FormInterface;
use Zend\Form\FieldsetInterface;

class BootstrapForm extends AbstractHelper
{
    public function __invoke(FormInterface $form, $style = 'vertical')
    { 
        if (!$form) {
            return $this;
        }
        
        return $this->render($form, $style);
    }
    
    /**
     * Render a form from the provided $form,
     *
     * @param  ElementInterface          $element
     * @param  null|string               $buttonContent
     * @throws Exception\DomainException
     * @return string
     */
    public function render(FormInterface $form, $style = 'vertical')
    {
        if (method_exists($form, 'prepare')) {
            $form->prepare();
        }
        
        $output = '';
        
        $output .= $this->openTag($form, $style);
        
        foreach ($form as $element) {
            if ($element instanceof FieldsetInterface) {
                $output .= $this->view->bootstrapCollection($element, $style);
            } else {
                $output .= $this->view->bootstrapRow($element, $style);
            }
        }
        
        $output .= $this->closeTag();
        
        return $output;
    }
    
    /**
     * Generate an opening form tag
     *
     * @param  null|FormInterface $form
     * @return string
     */
    public function openTag(FormInterface $form = null, $style = 'vertical')
    {
        if ($style) {
            $form->setAttribute('class', $form->getAttribute('class') . ' form-' . $style);
        }
        
        return $this->view->form()->openTag($form);
    }
    
    /**
     * Generate a closing form tag
     *
     * @return string
     */
    public function closeTag()
    {
        return $this->view->form()->closeTag();
    }
}