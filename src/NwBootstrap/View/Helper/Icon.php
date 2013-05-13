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
 * Cria o html do icon baseado nos icons do bootstrap
 * 
 * @category   NwBootstrap
 * @package    NwBootstrap\View
 * @subpackage Helper
 * @author     Renato Moura <renato@naturalweb.com.br>
 * @see        http://fortawesome.github.io/Font-Awesome/
 */
class Icon extends AbstractHtmlElement
{
    /**
     * Monta o icone do bootstrap
     * 
     * @param string $icon Class do Icone
     * 
     * @return string
     */
    public function __invoke($icon)
    {
        $icon = trim($icon);
        $icon = strtolower($icon);
        
        if (!preg_match("/^icon-[a-z][a-z\-]*$/", $icon)) {
            return '';
        }
        
        return sprintf(' <i class="%s"></i> ', $icon);
    }
}
