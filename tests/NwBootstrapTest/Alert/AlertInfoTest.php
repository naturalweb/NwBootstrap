<?php
namespace NwBootstrapTest\Alert;

use \PHPUnit_Framework_TestCase as TestCase;
use NwBootstrap\Alert\Alert;
use NwBootstrap\Alert\AlertInfo;

class AlertInfoTest extends TestCase
{
    public function testExtendsAlert()
    {
        $alert = new AlertInfo("Mensagem Alerta");
        $this->assertInstanceOf('NwBootstrap\Alert\Alert', $alert);
        
        $this->assertAttributeEquals(Alert::ALERT_INFO, 'status', $alert);
        
        $alert->setStatus(Alert::ALERT_INFO);
        $this->assertAttributeEquals(Alert::ALERT_INFO, 'status', $alert);
    }
}
