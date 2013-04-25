<?php
namespace NwBootstrap\Alert;

class Alert
{
    /**
     * Tipos de Alerts
     */
    const ALERT_DEFAULT = 'alert';
    const ALERT_ERROR   = 'alert-error';
    const ALERT_SUCCESS = 'alert-success';
    const ALERT_WARNING = 'alert-block';
    const ALERT_INFO    = 'alert-info';
    
    protected $message;
    
    protected $status;
    
    public function __construct($message, $status = null)
    {
        $this->setMessage($message);
        $this->setStatus($status);
    }
    
    public function setMessage($message)
    {
        if ($message instanceof Alert) {
            $message = $message->getMessage();
        }
        
        if (empty($message) || (!is_array($message) && !is_string($message))) {
            $message = null;
        } elseif(!is_array($message)) {
            $message = array_map('strval', (array) $message);
        }
        
        if (is_array($message)) {
            $message = array_filter($message);
        }
        
        $this->message = $message;
    }
    
    public function getMessage()
    {
        return $this->message;
    }
    
    public function setStatus($status)
    {
        if (!$this->hasStatus($status) ) {
            $status = self::ALERT_DEFAULT;
        }
        
        $this->status = $status;
    }
    
    public function getStatus()
    {
        return $this->status;
    }
    
    public function render($title = null, $close = true)
    {
        $html = '';
        $message = $this->getMessage();
        
        if (!$message) {
            return '';
        }
        
        $html .= '<div class="' . $this->classStatus() . '">';
        
        if ($close) {
            $html .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        }
        
        if ($title) {
            $html .= '<h4>' . $title . '</h4>';
        }
        
        $html .= '<p>' . $this->implodeMessages('<br />', $message) . '</p>';
        $html .= '</div>';
        
        return $html;
    }
    
    protected function implodeMessages($glue, $message)
    {
        $return = array();
        
        foreach ($message as $msg)
        {
            if (is_array($msg) || $msg instanceof Traversable) {
                $msg = $this->implodeMessages($glue, $msg);
                
            } elseif (is_object($msg) && method_exists($msg, '__toString')) {
                $msg = (string) $msg;
                
            } elseif(!is_string($msg)) {
                $msg = 'NULL';
            }
            
            if (!empty($msg)) {
                $return[] = $msg;
            }
        }
        
        return implode($glue, $return);
    }
        
    /**
     * Valida se o tipo solicitado é valido
     *
     * @param string $status Status do Alert
     *
     * @return boolean
     */
    protected function hasStatus($status)
    {
        $listStatus = array(
            self::ALERT_ERROR,
            self::ALERT_INFO,
            self::ALERT_SUCCESS,
            self::ALERT_WARNING,
        );
    
        return in_array($status, $listStatus);
    }
    
    protected function classStatus()
    {
        $class = 'alert ';
        $class .= $this->hasStatus($this->getStatus()) ? $this->getStatus() : '';
        
        return trim($class);
    }
}