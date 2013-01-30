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

use NwBootstrap\Bootstrap;
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
     * Valida se o tipo solicitado é valido
     * 
     * @param string $status Status do Alert
     * 
     * @return boolean
     */
    protected function hasAlert($status)
    {
        $listStatus = array(
            Bootstrap::ALERT_ERROR,
            Bootstrap::ALERT_INFO,
            Bootstrap::ALERT_SUCCESS,
            Bootstrap::ALERT_BLOCK,
            Bootstrap::ALERT_WARNING,
        );
        
        return in_array($status, $listStatus);
    }
    
    /**
     * Metodo que é invocado na view
     * 
     * @param string $message       Mensagem do Alert
     * @param string $statusDefault Tipo do Alert
     * @param string $title         Titulo
     * @param bool   $close         Botão close ?
     * 
     * @return string
     */
    public function __invoke($message, $statusDefault = Bootstrap::ALERT_INFO, $title = null, $close = true)
    {
        $alerts = array();
        
        if (is_string($message) && !empty($message)) {
            $message = (array) $message;
        
        } elseif ( !is_array($message) || !count($message) ) {
            return '';
        }
        
        // Lista as Mensagens
        foreach ($message as $msg) {
            $status = $statusDefault;
            
            if (is_array($msg)) {
                
                if( key_exists("status", $msg) )
                    $status = (string) $msg['status'];
                    
                if (key_exists("message", $msg))
                    $msg = (string) $msg['message'];
        
            } elseif (!is_string($msg)) {
                continue;
            }
            
            if (!$this->hasAlert($status)) {
                $status = $statusDefault;
            }
            
            $alerts[$status][] = $msg;
        }
        
        if (!count($alerts)) {
            return '';
        }
        
        $html = '';
        
        foreach ($alerts as $status => $msg) {
            if (count($msg)) {
                $html .= '<div class="alert alert-' . $status . '">';
                
                if ($close) {
                    $html .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
                }
                
                if ($title) {
                    $html .= '<h4>' . $title . '</h4>';
                }
                
                if (count($msg) == 1) {
                    $html .= '<p>' . $msg[0] . '</p>';
                    
                } else if (is_array($msg)) {
                    $html .= $this->getView()->htmlList($msg);
                }
                
                $html .= '</div>';
            }
        }
        
        return $html;
    }
}
