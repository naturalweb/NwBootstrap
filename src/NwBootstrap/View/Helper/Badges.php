<?php
namespace NwBootstrap\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Badges extends AbstractHelper
{	
	/**
	 * BADGES 
	 */
	const BADGES_DEFAULT   = "default";
	const BADGES_SUCCESS   = "success";
	const BADGES_WARNING   = "warning";
	const BADGES_IMPORTANT = "important";
	const BADGES_INFO      = "info";
	const BADGES_INVERSE   = "inverse";
		
	/**
	 * CRIA A BADGE
	 * 
	 * @return string
	 */
	public function __invoke($txt, $class = self::BADGES_DEFAULT, $render = true)
	{		
		$badges = "";
		
		if ( $render ) {
			$listBadges = $this->listBadges();
			
			if (!in_array($class, $listBadges)){
				$class = self::BADGES_DEFAULT;
			}		
			$badges = "<span class='badge badge-{$class}'>{$txt}</span>";
		}
		
		return $badges;
	}
	
	/**
	 * LISTA DE BADGES PERMITIDAS
	 * 
	 * @return array
	 */
	protected function listBadges()
	{
		$badges = array(
				self::BADGES_DEFAULT,
				self::BADGES_SUCCESS,
				self::BADGES_WARNING,
				self::BADGES_IMPORTANT,
				self::BADGES_INFO,
				self::BADGES_INVERSE,
		);		
		return $badges;
		
	}
}