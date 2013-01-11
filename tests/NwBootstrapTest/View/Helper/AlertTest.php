<?php

namespace NwBootstrapTest\View\Helper;

use NwBase\Test\AbstractTestCase;
use NwBootstrap\View\Helper\Alert;
use NwBootstrap\Bootstrap;
use Zend\View\Renderer\PhpRenderer as View;

class AlertTest extends AbstractTestCase
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
	}
	
	public function testAlertStringVazia()
	{
		$html = $this->alert->__invoke('');
		
		$this->assertEmpty($html, "Erro ao assertar que o retorno foi vazio!" );
	}
	
	public function testAlertArrayVazio()
	{
		$html = $this->alert->__invoke(array());
		        
		$this->assertEmpty($html, "Erro ao assertar que o retorno foi vazio!" );
	}
	
	public function testAlertListComStatus()
	{
		$listMessage = array(
			array('status' => '222', 'message' => 'Alguma mensagem de erro!'),
		    array('status' => '222', 'message' => 'Alguma mensagem de aviso!'),
		);
		$html = $this->alert->__invoke($listMessage);
		
		$this->assertQueryCount($html, 'div.alert-info li', 2,'Erro, número retornado não corresponde!');
		$this->assertQuery($html, 'div.alert-info button.close', 'Button de CLose não encontrado');
	}
	
	public function testAlertListSomenteString()
	{
	    $title = "Titulo do Alert";
	    
	    $listMessage = array(
            'Alguma mensagem',
	        'Outro Aviso',
	    );
	    $html = $this->alert->__invoke($listMessage, Bootstrap::ALERT_SUCCESS, $title);
	    
	    $this->assertQueryCount($html, 'div.alert-success li', 2,'Erro, número retornado não corresponde!');
	    $this->assertQueryContentContains($html, 'div.alert-success h4', $title, "Title nao encontrado");
	}
	
	public function testAlertUnicaMensagem()
	{
		$alert = $this->alert;
		$message = "mensagem de perigo";
		$html = $this->alert->__invoke($message, Bootstrap::ALERT_WARNING, '', false);
		
		$this->assertQueryContentContains($html, 'div.alert-block p', $message, "Texto de mensagem não encontrado no alert");
		$this->assertNotQuery($html, 'div.alert-block h4', 'Não Deveria aparecer nenhum Title');
		$this->assertNotQuery($html, 'div.alert-block button.close', 'Não Deveria aparecer o Button de close');
	}
}