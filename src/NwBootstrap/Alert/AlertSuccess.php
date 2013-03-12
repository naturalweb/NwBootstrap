<?php
namespace NwBootstrap\Alert;

class AlertSuccess extends Alert
{
    public function __construct($message, $status = null)
    {
        $status = self::ALERT_SUCCESS;
        parent::__construct($message, $status);
    }
    
    public function setStatus($status)
    {
        $this->status = self::ALERT_SUCCESS;
    }
}
