<?php
return array(
    'view_helpers' => array(
        'invokables' => array(
            'bootstrapForm'       => 'NwBootstrap\Form\View\Helper\BootstrapForm',
            'bootstrapRow'        => 'NwBootstrap\Form\View\Helper\BootstrapRow',
            'bootstrapCollection' => 'NwBootstrap\Form\View\Helper\BootstrapCollection',
            'bootstrapNavbar'     => 'NwBootstrap\Navigation\View\Helper\Navbar',
            'bootstrapAlert'      => 'NwBootstrap\View\Helper\Alert',
            'bootstrapPageHeader' => 'NwBootstrap\View\Helper\PageHeader',
        	'bootstrapBadges' 	  => 'NwBootstrap\View\Helper\Badges',
        	'bootstrapLabels' 	  => 'NwBootstrap\View\Helper\Labels',
        ),
    ),
    
    'controller_plugins' => array(
        'invokables' => array(
            'alertMessenger' => 'NwBootstrap\Controller\Plugin\AlertMessenger',
        ),
    ),
);