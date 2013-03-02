<?php

namespace NwBootstrapTest\View\Helper;

use NwBootstrap\View\Helper\Alert;
use NwBootstrap\Alert\Alert as AlertStatus;
use Zend\View\Renderer\PhpRenderer as View;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase as TestCase;

class AlertTest extends TestCase
{
	protected $alert;

	public function setUp()
	{
		$this->alert = new Alert();
		$view = new View();
		$this->alert->setView($view);

		$this->assertTrue(
			class_exists($class = 'NwBootstrap\View\Helper\Alert'),
			"Classe NwBootstrap\View\Helper\Alert not found " . $class
		);
		
		$this->setApplicationConfig(
		    include __DIR__ . '/../../../_files/config/application.config.php'
		);
	}
	
	public function testAlertEmpty()
	{
		$html = $this->alert->__invoke('');
		$this->assertEmpty($html, "Erro ao assertar que o retorno foi vazio!" );
		
		$html = $this->alert->__invoke(array());
		$this->assertEmpty($html, "Erro ao assertar que o retorno foi vazio!" );
	}
	
	public function testAlertWithMessagesInArray()
	{
		$listMessage = array(
			array('Alguma mensagem de erro!'),
		    array('Alguma mensagem de aviso!'),
		);
		$html = $this->alert->__invoke($listMessage);
		$this->getApplication()->getResponse()->setContent($html);
		
		$this->assertQueryCount('div.alert-info', 2, 'Deveria exibir dois alert');
		$this->assertQueryCount('div.alert-info button.close', 2, 'Button de Close não encontrado');
	}
	
	public function testAlertWithTitleNotClose()
	{
	    $title = "Titulo do Alert";
	    $message = 'Alguma mensagem';
	    
	    $html = $this->alert->__invoke($message, $title, false);
	    $this->getApplication()->getResponse()->setContent($html);
	    
	    $this->assertQuery('div.alert-info');
	    $this->assertQueryContentContains('div.alert-info h4', $title);
	    $this->assertNotQuery('div.alert-info button.close');
	}
	
	public function testAlertWithObjectsAlert()
	{
	    $msg = 'Alguma mensagem';
	    $message = new AlertStatus($msg, AlertStatus::ALERT_SUCCESS);
	    
	    $html = $this->alert->__invoke($message);
	    $this->getApplication()->getResponse()->setContent($html);
	    
	    $this->assertQueryContentContains('div.alert-success p', $msg);
	}
}