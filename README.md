NwBootstrap
===========

Simple Module to allow facilitate use of Twitter Bootstrap Zend Framework 2

Installation
------------

Para seu Skeleton Application Zend Framework 2
  
Você precisa fazer o download do [Twitters Bootstrap](http://twitter.github.com/bootstrap) e adicione na pasta public do seu projeto.
    
Adicionae ao layout as tag de estiloes e scripts do Twitters Bootstrap.

    <?=$this->headLink()->appendStylesheet($this->basePath() . '/assets/bootstrap/css/bootstrap.min.css')
                        ->appendStylesheet($this->basePath() . '/assets/bootstrap/css/bootstrap-responsive.min.css')?>
    <?=$this->headScript()->appendFile($this->basePath() . '/assets/bootstrap/js/bootstrap.min.js') ?>
    
Funcionalidades
---------------

*   Form View Helpers
    *    Bootstrap Form - Render a complete form
    *    Bootstrap Collection - Render a collection Element
    *    Bootstrap Row = Render an element
*   Navigation View Helpers(Navbar only)
*   Alert View Helpers
