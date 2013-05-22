<?php

namespace ZendTest\View\Helper\Navigation;

use Zend\ServiceManager\ServiceManager;
use NwBootstrap\Navigation\View\Helper\Breadcrumbs;
use Zend\View\Renderer\PhpRenderer as View;
use Zend\Navigation\Navigation;

class BreadcrumbsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Zend\ServiceManager\ServiceManager
     */
    protected $serviceManager;
    
    /**
     * View helper
     *
     * @var \Zend\View\Helper\Navigation\Breadcrumbs
     */
    protected $_helper;
    
    /**
     * Prepares the environment before running a test
     *
     */
    protected function setUp()
    {
        $view = new View();
        $this->_helper = new Breadcrumbs();
        $this->_helper->setView($view);
        
        $this->serviceManager = new ServiceManager();
    }
    
    public function testCanRenderStraightFromContainer()
    {
        $this->_helper->setServiceLocator($this->serviceManager);
        
        $default = array(
            array('label' => 'Teste1','uri' => '/teste1', 'title' => 'TESTE', 'pages' => array(
                    array('label' => 'Teste2', 'uri' => '/teste2', 'active' => true)
            )),
        );
        $navigation = new Navigation($default);
        
        $expected  = '<ul class="breadcrumbs">' . PHP_EOL;
        $expected .= '<li><a title="TESTE" href="/teste1">Teste1</a></li>' . PHP_EOL;
        $expected .= '<li>Teste2</li>' . PHP_EOL;
        $expected .= '</ul>' . PHP_EOL;
        
        $returned = $this->_helper->renderStraight($navigation);
        $this->assertEquals($returned, $expected);
    }
}