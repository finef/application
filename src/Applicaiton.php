<?php

namespace \Fine\Application;

use \Fine\Container\Container;
use \Fine\Event\EventDispatcher;
use \Fine\Event\Event;

class Application extends Container
{

    /**
     * Bootstrap application
     */
    public function bootstrap($modules)
    {

        // set modules definitions and register them
        $this->mod->__invoke($modules)->each()->register($this);

        // run bootstrap event
        $this->event->run((new Event())->setId('bootstrap')->setApp($this));
    
    }

    /**
     * Get module manager
     *
     * @return \Fine\Application\ModuleManager
     */
    protected function _mod()
    {
        return $this->mod = new ModuleManager();
    }

    /**
     * Get event manager
     *
     * @return \Fine\Event\EventManager
     */
    protected function _events()
    {
        return $this->events = new EventDispatcher();
    }

}
