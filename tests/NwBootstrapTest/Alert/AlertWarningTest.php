<?php
namespace NwBootstrapTest\Alert;

use \PHPUnit_Framework_TestCase as TestCase;
use NwBootstrap\Alert\Alert;
use NwBootstrap\Alert\AlertWarning;

class AlertWarningTest extends TestCase
{
    public function testExtendsAlert()
    {
        $alert = new AlertWarning("Mensagem Alerta");
        $this->assertInstanceOf('NwBootstrap\Alert\Alert', $alert);
        
        $this->assertAttributeEquals(Alert::ALERT_WARNING, 'status', $alert);
        
        $alert->setStatus(Alert::ALERT_WARNING);
        $this->assertAttributeEquals(Alert::ALERT_WARNING, 'status', $alert);
    }
}
