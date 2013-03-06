<?php

namespace NwBootstrapTest\View\Helper;

use NwBootstrap\View\Helper\Labels;

class LabelsTest extends \PHPUnit_Framework_TestCase
{
       
	public function setUp()
	{
		$this->txt = 'algum texto';	
	}
	
    public function testValidLabels()
    {   	    	
    	$labels = new Labels();
    	
        $label = $labels($this->txt, Labels::LABELS_DEFAULT, true);
        $this->assertEquals("<span class='label label-default'>".$this->txt."</span>", $label);

        $label = $labels($this->txt, Labels::LABELS_SUCCESS, true);
        $this->assertEquals("<span class='label label-success'>".$this->txt."</span>", $label);
        
        $label = $labels($this->txt, Labels::LABELS_WARNING, true);
        $this->assertEquals("<span class='label label-warning'>".$this->txt."</span>", $label);
        
        $label = $labels($this->txt, Labels::LABELS_IMPORTANT, true);
        $this->assertEquals("<span class='label label-important'>".$this->txt."</span>", $label);
        
        $label = $labels($this->txt, Labels::LABELS_INFO, true);
        $this->assertEquals("<span class='label label-info'>".$this->txt."</span>", $label);
        
        $label = $labels($this->txt, Labels::LABELS_INVERSE, true);
        $this->assertEquals("<span class='label label-inverse'>".$this->txt."</span>", $label);         
    }    
    
    public function testeNotInArrayBadge()
    {
    	$labels = new Labels();
    	$label = $labels($this->txt, 'inventado', true);
    	$this->assertEquals("<span class='label label-default'>".$this->txt."</span>", $label); 	
    }
    
    public function testeDefault3ndParameter()
    {
    	$labels = new Labels();
    	$label = $labels($this->txt, 'default');
    	$this->assertEquals("<span class='label label-default'>".$this->txt."</span>", $label);
    }

    public function testeDefault2ndParameter()
    {
    	$labels = new Labels();
    	$label = $labels($this->txt);
    	$this->assertEquals("<span class='label label-default'>".$this->txt."</span>", $label);
    }    
    
    public function testeFirstParameterFalseBadge()
    {
    	$labels = new Labels();
    	$label = $labels($this->txt, Labels::LABELS_DEFAULT, false);
    	$this->assertEmpty($label);
    }    
        
}