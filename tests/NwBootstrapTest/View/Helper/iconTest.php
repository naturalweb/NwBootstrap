<?php

namespace NwBootstrap\View\Helper;

use NwBootstrap\View\Helper\Icon;
use Zend\View\Renderer\PhpRenderer as View;
use \PHPUnit_Framework_TestCase as TestCase;

class IconTest extends TestCase
{
	public function testInvokeHelperIconFormatValid()
	{
		$icon = ' ICON-print ';
	    $helper = new Icon();
		$return = $helper($icon);
		
		$expected = '<i class="icon icon-print"></i> ';
	    $this->assertEquals($expected, $return);
	}
	
	public function testIconFormatInvalid()
	{
	    $icon = ' ICON- ';
	    $helper = new Icon();
	    $return = $helper($icon);
	
	    $expected = '<i class="icon "></i> ';
	    $this->assertEquals($expected, $return);
	}
}
