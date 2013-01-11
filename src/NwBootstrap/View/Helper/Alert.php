<?php

namespace NwBootstrap\View\Helper;

use NwBootstrap\Bootstrap;
use Zend\View\Helper\AbstractHtmlElement;

class Alert extends AbstractHtmlElement
{
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