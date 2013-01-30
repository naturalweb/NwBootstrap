<?php
return array(
    'modules' => array(
        'NwBootstrap',
    ),
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        'module_paths' => array(
            './src',
            './vendor',
        ),
    ),
);
