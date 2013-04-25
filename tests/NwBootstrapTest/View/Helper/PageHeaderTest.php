<?php

namespace NwBootstrap\View\Helper;

use NwBootstrap\View\Helper\PageHeader;
use Zend\View\Renderer\PhpRenderer as View;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase as TestCase;

class PageHeaderTest extends TestCase
{
	protected $_helper;
	
	public function setUp()
	{		
		$this->_helper = new PageHeader();
		$view = new View();
		$this->_helper->setView($view);
		
		$this->setApplicationConfig(
		        include __DIR__ . '/../../../_files/config/application.config.php'
		);
	}
	    
	public function testTitulo()
	{
		$titulo = "AAAAAAAA";	
		$PageHeader=$this->_helper; 
		$html = $PageHeader($titulo);
		$this->getApplication()->getResponse()->setContent($html);
		
	    $this->assertQueryContentContains('div.page-header h2', $titulo);
	}
	
	public function testTituloSubTitulo()
	{
		$titulo = "AAAAAAAA";
		$subTitulo = "BBBBBBBB";
		$PageHeader=$this->_helper;
		$html = $PageHeader($titulo, $subTitulo);
		$this->getApplication()->getResponse()->setContent($html);
		
		$this->assertQueryContentContains('div.page-header h2 small', $subTitulo);
		
		$match = strip_tags($titulo.' <small>'.$subTitulo.'</small>');
		$this->assertQueryContentContains('div.page-header h2', $match);
	}
}
