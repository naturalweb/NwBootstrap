<?php
namespace NwBootstrapTest\Alert;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase as TestCase;
use NwBootstrap\Alert\Alert;

class AlertTest extends TestCase
{
    public function setUp()
    {
        $this->setApplicationConfig(
            include __DIR__ . '/../../_files/config/application.config.php'
        );
    }
    
    public function testMesageWithStringDefault()
    {
        $msg = "Mensagem Alerta";
        $alert = new Alert($msg);
        
        $this->assertAttributeEquals(array($msg), 'message', $alert);
        $this->assertAttributeEquals(Alert::ALERT_DEFAULT, 'status', $alert);
        
        $this->assertEquals(array($msg), $alert->getMessage());
        $this->assertEquals(Alert::ALERT_DEFAULT, $alert->getStatus());
    }
    
    public function testUpdateStatusAndMessage()
    {
        $alert = new Alert('', Alert::ALERT_INFO);
        
        $this->assertAttributeEquals(null, 'message', $alert);
        $this->assertAttributeEquals(Alert::ALERT_INFO, 'status', $alert);
        
        $alert->setStatus(Alert::ALERT_ERROR);
        $this->assertAttributeEquals(Alert::ALERT_ERROR, 'status', $alert);
        
        $alert->setStatus('ERRADO');
        $this->assertAttributeEquals(Alert::ALERT_DEFAULT, 'status', $alert);
        
        $msgs = array('msg1', 'msg2');
        $alert->setMessage($msgs);
        $this->assertAttributeEquals($msgs, 'message', $alert);
    }
    
    public function testRenderDefaul()
    {
        $msg = "Mensagem Alerta";
        $alert = new Alert($msg, Alert::ALERT_SUCCESS);
        
        $render = $alert->render();
        $this->getApplication()->getResponse()->setContent($render);
        
        $this->assertQueryContentContains('div.alert-success p', $msg);
    }
    
    public function testRenderNotWithCloseAndTitle()
    {
        $msg = "Mensagem Alerta";
        $alert = new Alert($msg);
        
        $title = "TITULO";
        
        $render = $alert->render($title, false);
        $this->getApplication()->getResponse()->setContent($render);
    
        $this->assertNotQuery('div.alert .close');
        $this->assertQueryContentContains('div.alert h4', $title);
    }
}