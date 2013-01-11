<?php

namespace NwBootstrap\View\Helper;

use Zend\View\Helper\AbstractHtmlElement;

/**
 * Monta a Page header
 *
 * @package MY_View_Helper_Navigation_PageHeader
 * @author  Renato Moura <renato@naturalweb.com.br>
 * @since   1.0
 */
class PageHeader extends AbstractHtmlElement
{
    /**
     * Monta page header do bootstrap
     * 
     * @param string  $titulo     Titulo
     * @param string  $sub_titulo Subtitulo
     * @param string  $extra      Extra
     * 
     * @return string
     */
    public function __invoke($titulo, $sub_titulo = null, $extra = null)
    {
        $return = '';
        
        $return .= '<div class="page-header">';
        $return .= '<h2> '.$this->view->escapeHtml($titulo);
        
        if( $sub_titulo )
        $return .= ' <small>'.$this->view->escapeHtml($sub_titulo).'</small> ';
        
        if( $extra )
        $return .= $extra;
        
        $return .= ' </h2>';
        $return .= '</div>';
        
        return $return;
    }
}
