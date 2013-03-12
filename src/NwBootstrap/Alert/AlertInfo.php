<?php
namespace NwBootstrap\Alert;

class AlertInfo extends Alert
{
    public function __construct($message, $status = null)
    {
        $status = self::ALERT_INFO;
        parent::__construct($message, $status);
    }
    
    public function setStatus($status)
    {
        $this->status = self::ALERT_INFO;
    }
}
