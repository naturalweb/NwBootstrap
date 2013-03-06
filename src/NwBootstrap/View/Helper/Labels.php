<?php
namespace NwBootstrap\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Labels extends AbstractHelper
{	
	/**
	 * LABELS 
	 */
	const LABELS_DEFAULT   = "default";
	const LABELS_SUCCESS   = "success";
	const LABELS_WARNING   = "warning";
	const LABELS_IMPORTANT = "important";
	const LABELS_INFO      = "info";
	const LABELS_INVERSE   = "inverse";
		
	/**
	 * CRIA A BADGE
	 * 
	 * @return string
	 */
	public function __invoke($txt, $class = self::LABELS_DEFAULT, $render = true)
	{		
		$labels = "";
		
		if ( $render ) {
			$listLabels = $this->listLabels();
			
			if (!in_array($class, $listLabels)){
				$class = self::LABELS_DEFAULT;
			}		
			$labels = "<span class='label label-{$class}'>{$txt}</span>";
		}
		
		return $labels;
	}
	
	/**
	 * LISTA DE LABELS PERMITIDAS
	 * 
	 * @return array
	 */
	protected function listLabels()
	{
		$labels = array(
				self::LABELS_DEFAULT,
				self::LABELS_SUCCESS,
				self::LABELS_WARNING,
				self::LABELS_IMPORTANT,
				self::LABELS_INFO,
				self::LABELS_INVERSE,
		);		
		return $labels;
		
	}
}