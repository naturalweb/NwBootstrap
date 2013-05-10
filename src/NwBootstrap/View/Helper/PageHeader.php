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
    public function __invoke($titulo, $subTitulo = null, $extra = null)
    {
        $pageHeader  = "<div class='clearfix page-header'>";
        $pageHeader .= "<h2>";
        $pageHeader .= $titulo;
        
        if (!empty($subTitulo)) {
            $pageHeader .= " <small>{$subTitulo}</small>";
        }
        
        $pageHeader .= "</h2>";
        
        if (!empty($extra)) {
            $pageHeader .= $extra;
        }
        
        $pageHeader .= "</div>";
        
        return $pageHeader;
    }
}
