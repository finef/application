<?php

namespace \Fine\Application;

use \Fine\Container\Container;
use \Fine\Event\EventDispatcher;
use \Fine\Event\Event;

class Application extends FineContainer
{

    /**
     * Bootstrap application
     */
    public function bootstrap($modules)
    {
        // set modules definitions and register them
        $this->mod->__invoke($modules)->hooks()->fine->register($this);

        // run bootstrap event
        $this->event->run((new Event())->setId('fine.bootstrap')->setFine($this));
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
    protected function _event()
    {
        return $this->event = new EventDispatcher();
    }

}
