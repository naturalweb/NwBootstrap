<?php
namespace NwBootstrap\Alert;

class AlertWarning extends Alert
{
    public function __construct($message, $status = null)
    {
        $status = self::ALERT_WARNING;
        parent::__construct($message, $status);
    }
    
    public function setStatus($status)
    {
        $this->status = self::ALERT_WARNING;
    }
}
