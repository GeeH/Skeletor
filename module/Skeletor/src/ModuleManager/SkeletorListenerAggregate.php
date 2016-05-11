<?php
/**
 * Created by PhpStorm.
 * User: GeeH
 * Date: 09/05/2016
 * Time: 12:39
 */

namespace Skeletor\ModuleManager;


use Zend\EventManager\EventManagerInterface;
use Zend\ModuleManager\Listener\DefaultListenerAggregate;

class SkeletorListenerAggregate extends DefaultListenerAggregate
{
    public function attach(EventManagerInterface $events, $priority = 1)    {
        parent::attach($events, $priority);
    }

    /**
     * @return \Skeletor\ModuleManager\ConfigMergerInterface|\Zend\ModuleManager\Listener\ConfigMergerInterface
     */
    public function getConfigListener()
    {
        if (!$this->configListener instanceof ConfigMergerInterface) {
            $this->setConfigListener(new SkeletorConfigListener($this->getOptions()));
        }
        return $this->configListener;
    }
    
}