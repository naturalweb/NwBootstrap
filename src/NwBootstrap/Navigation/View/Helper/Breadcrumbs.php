<?php

namespace NwBootstrap\Navigation\View\Helper;

use Zend\View\Helper\Navigation\Breadcrumbs as ZendBreadcrumbs;
use Zend\Navigation\AbstractContainer;
use Zend\Navigation\Page\AbstractPage;
use Zend\View;
use Zend\View\Exception;

/**
 * Helper for printing breadcrumbs
 */
class Breadcrumbs extends ZendBreadcrumbs
{
    /**
     * Breadcrumbs separator string
     *
     * @var string
     */
    protected $separator = ' / ';
    
    /**
     * Renders breadcrumbs by chaining 'a' elements with the separator
     * registered in the helper
     *
     * @param  AbstractContainer $container [optional] container to render. Default is
     *                              to render the container registered in the helper.
     * @return string               helper output
     */
    public function renderStraight($container = null)
    {
        $this->parseContainer($container);
        if (null === $container) {
            $container = $this->getContainer();
        }

        // find deepest active
        if (!$active = $this->findActive($container)) {
            return '';
        }

        $active = $active['page'];

        // put the deepest active page last in breadcrumbs
        if ($this->getLinkLast()) {
            $html = $this->htmlify($active);
        } else {
            $html = $active->getLabel();
            if (null !== ($translator = $this->getTranslator())) {
                $html = $translator->translate($html, $this->getTranslatorTextDomain());
            }
            $escaper = $this->view->plugin('escapeHtml');
            $html    = $escaper($html);
        }
        
        $listPages = array();
        
        if (!empty($html)) {
            array_unshift($listPages, $html);
        }
        
        // walk back to root
        while ($parent = $active->getParent()) {
            if ($parent instanceof AbstractPage) {
                // prepend crumb to html
                $html = $this->htmlify($parent) . $this->getSeparator();
                if (!empty($html)) {
                    array_unshift($listPages, $html);
                }
            }

            if ($parent === $container) {
                // at the root of the given container
                break;
            }
            
            $active = $parent;
        }
        
        $ordered = false;
        $attribs = array('class' => 'breadcrumb');
        $escape = false;
        return $this->view->htmlList($listPages, $ordered, $attribs, $escape);
    }
}