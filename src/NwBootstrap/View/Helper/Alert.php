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

use NwBootstrap\Alert\Alert as AlertStatus;
use Zend\View\Helper\AbstractHtmlElement;

/**
 * Cria um alert html com o padrão do bootstrap twitter
 * 
 * @category   NwBootstrap
 * @package    NwBootstrap\View
 * @subpackage Helper
 * @author     Renato Moura <renato@naturalweb.com.br>
 * @see        http://twitter.github.com/bootstrap/components.html#alerts
 */
class Alert extends AbstractHtmlElement
{    
    /**
     * Metodo que é invocado na view
     * 
     * @param string $messages       Mensagem do Alert
     * @param string $statusDefault Tipo do Alert
     * @param string $title         Titulo
     * @param bool   $close         Botão close ?
     * 
     * @return string
     */
    public function __invoke($messages, $title = null, $close = true)
    {
        $alerts = array();
        if (empty($messages)) {
            return '';
        }
        
        if ($messages instanceof AlertStatus || is_string($messages)) {
            $messages = array($messages);
        }
        
        if (!is_array($messages)) {
            return '';
        }
        
        $html = '';
        
        // Lista as Mensagens
        foreach ($messages as $msg) {
            
            if (!$msg instanceof AlertStatus) {
                $msg = new AlertStatus($msg);
            }
            
            $html .= $msg->render($title, $close);
        }
        
        return $html;
    }
}
