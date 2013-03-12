<?php
namespace NwBootstrap\Alert;

class AlertError extends Alert
{
    public function __construct($message, $status = null)
    {
        $status = self::ALERT_ERROR;
        parent::__construct($message, $status);
    }
    
    public function setStatus($status)
    {
        $this->status = self::ALERT_ERROR;
    }
}
