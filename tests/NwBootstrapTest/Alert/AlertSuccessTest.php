<?php
namespace NwBootstrapTest\Alert;

use \PHPUnit_Framework_TestCase as TestCase;
use NwBootstrap\Alert\Alert;
use NwBootstrap\Alert\AlertSuccess;

class AlertSuccessTest extends TestCase
{
    public function testExtendsAlert()
    {
        $alert = new AlertSuccess("Mensagem Alerta");
        $this->assertInstanceOf('NwBootstrap\Alert\Alert', $alert);
        
        $this->assertAttributeEquals(Alert::ALERT_SUCCESS, 'status', $alert);
        
        $alert->setStatus(Alert::ALERT_ERROR);
        $this->assertAttributeEquals(Alert::ALERT_SUCCESS, 'status', $alert);
    }
}
