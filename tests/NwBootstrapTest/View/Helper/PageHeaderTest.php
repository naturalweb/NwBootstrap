<?php

namespace NwBootstrap\View\Helper;

use NwBase\Test\AbstractTestCase;
use NwBootstrap\View\Helper\PageHeader;
use Zend\View\Renderer\PhpRenderer as View;

class PageHeaderTest extends AbstractTestCase
{
	protected $_helper;
	
	public function setUp()
	{		
		$this->_helper = new PageHeader();
		$view = new View();
		$this->_helper->setView($view);
	}
	    
	public function testTitulo()
	{
		$titulo = "AAAAAAAA";	
		$PageHeader=$this->_helper; 
		$_html = $PageHeader($titulo);
			    
	    $this->assertQueryContentContains($_html, 'div.page-header h2', $titulo);
	}
	
	public function testTituloSubTitulo()
	{
		$titulo = "AAAAAAAA";
		$subTitulo = "BBBBBBBB";
		$PageHeader=$this->_helper;
		$_html = $PageHeader($titulo, $subTitulo);
		
		$this->assertQueryContentContains($_html, 'div.page-header h2 small', $subTitulo);
		
		$match = $titulo.' <small>'.$subTitulo.'</small>';
		$this->assertQueryContentContains($_html, 'div.page-header h2', $match);
	}
	
}
