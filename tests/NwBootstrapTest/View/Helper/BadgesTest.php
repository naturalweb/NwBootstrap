<?php

namespace NwBootstrapTest\View\Helper;

use NwBootstrap\View\Helper\Badges;

class BadgesTest extends \PHPUnit_Framework_TestCase
{
       
	public function setUp()
	{
		$this->txt = 'algum texto';	
	}
	
    public function testValidBadges()
    {   	    	
    	$badges = new Badges();
    	
        $badge = $badges($this->txt, Badges::BADGES_DEFAULT, true);
        $this->assertEquals("<span class='badge badge-default'>".$this->txt."</span>", $badge);

        $badge = $badges($this->txt, Badges::BADGES_SUCCESS, true);
        $this->assertEquals("<span class='badge badge-success'>".$this->txt."</span>", $badge);
        
        $badge = $badges($this->txt, Badges::BADGES_WARNING, true);
        $this->assertEquals("<span class='badge badge-warning'>".$this->txt."</span>", $badge);
        
        $badge = $badges($this->txt, Badges::BADGES_IMPORTANT, true);
        $this->assertEquals("<span class='badge badge-important'>".$this->txt."</span>", $badge);
        
        $badge = $badges($this->txt, Badges::BADGES_INFO, true);
        $this->assertEquals("<span class='badge badge-info'>".$this->txt."</span>", $badge);
        
        $badge = $badges($this->txt, Badges::BADGES_INVERSE, true);
        $this->assertEquals("<span class='badge badge-inverse'>".$this->txt."</span>", $badge);         
    }    
    
    public function testeNotInArrayBadge()
    {
    	$badges = new Badges();
    	$badge = $badges($this->txt, 'inventado', true);
    	$this->assertEquals("<span class='badge badge-default'>".$this->txt."</span>", $badge); 	
    }
    
    public function testeDefault3ndParameter()
    {
    	$badges = new Badges();
    	$badge = $badges($this->txt, 'default');
    	$this->assertEquals("<span class='badge badge-default'>".$this->txt."</span>", $badge);
    }

    public function testeDefault2ndParameter()
    {
    	$badges = new Badges();
    	$badge = $badges($this->txt);
    	$this->assertEquals("<span class='badge badge-default'>".$this->txt."</span>", $badge);
    }    
    
    public function testeFirstParameterFalseBadge()
    {
    	$badges = new Badges();
    	$badge = $badges($this->txt, Badges::BADGES_DEFAULT, false);
    	$this->assertEmpty($badge);
    }    
        
}