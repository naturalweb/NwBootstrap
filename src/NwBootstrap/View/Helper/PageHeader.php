<?php
/**
 * Natural Web Ltda. (http://www.naturalweb.com.br)
 * 
 * @copyright  Copyright (c) Natural Web Ltda. (http://www.naturalweb.com.br)
 * @license    BSD-3-Clause
 * @package    NwBootstrap\View
 * @subpackage Helper
 */
namespace NwBootstrap\View\Helper;

use Zend\View\Helper\AbstractHtmlElement;

/**
 * Cria o html do component PageHeader bootstrap twitter
 * 
 * @category   NwBootstrap
 * @package    NwBootstrap\View
 * @subpackage Helper
 * @author     Renato Moura <renato@naturalweb.com.br>
 * @see        http://twitter.github.com/bootstrap/components.html#typography
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
        $return .= '<h2>'.$this->view->escapeHtml($titulo);
        
        if ($sub_titulo) {
            $return .= ' <small>'.$this->view->escapeHtml($sub_titulo).'</small>';
        }
        
        if ($extra) {
            $return .= $extra;
        }
        
        $return .= '</h2>';
        $return .= '</div>';
        
        return $return;
    }
}
