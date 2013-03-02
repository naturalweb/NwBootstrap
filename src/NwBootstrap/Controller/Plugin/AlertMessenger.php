<?php
namespace NwBootstrap\Controller\Plugin;

use Countable;
use NwBootstrap\Alert\Alert;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\Mvc\Controller\Plugin\FlashMessenger;

class AlertMessenger extends AbstractPlugin implements Countable
{
    /** 
     * @var FlashMessenger
     */
    protected $fm = null;
    
    public function __construct()
    {
        $this->fm = new FlashMessenger();
    }
    
    /**
     * Add a message
     *
     * @param  string         $message
     * @return FlashMessenger Provides a fluent interface
     */
    public function addMessage($message)
    {
        $message = new Alert($message, Alert::ALERT_DEFAULT);
        $this->fm->addMessage($message);
        
        return $this;
    }
    
    /**
     * Add a message with "info" type
     *
     * @param  string         $message
     * @return FlashMessenger
     */
    public function addInfoMessage($message)
    {
        $message = new Alert($message, Alert::ALERT_INFO);
        $this->fm->addMessage($message);
        
        return $this;
    }
    
    /**
     * Add a message with "success" type
     *
     * @param  string         $message
     * @return FlashMessenger
     */
    public function addSuccessMessage($message)
    {
        $message = new Alert($message, Alert::ALERT_SUCCESS);
        $this->fm->addMessage($message);
        
        return $this;
    }
    
    /**
     * Add a message with "error" type
     *
     * @param  string         $message
     * @return FlashMessenger
     */
    public function addErrorMessage($message)
    {
        $message = new Alert($message, Alert::ALERT_ERROR);
        $this->fm->addMessage($message);
        
        return $this;
    }
    
    /**
     * Whether a specific namespace has messages
     *
     * @return bool
     */
    public function hasMessages()
    {
        return $this->fm->hasMessages();
    }
    
    /**
     * Get messages from a specific namespace
     *
     * @return array
     */
    public function getMessages()
    {
        return $this->fm->getMessages();
    }
    
    /**
     * Complete the countable interface
     *
     * @return int
     */
    public function count()
    {
        return $this->fm->count();
    }
    
    /**
     * Change the namespace messages are added to
     *
     * Useful for per action controller messaging between requests
     *
     * @param  string         $namespace
     * @return FlashMessenger Provides a fluent interface
     */
    public function setNamespace($namespace = 'default')
    {
        $this->fm->setNamespace($namespace);
    
        return $this;
    }
}