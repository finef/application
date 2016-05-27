<?php

namespace \Fine\Application;

class ModuleManager extends \Fine\Application\FineContainer
{
    
    protected $_hooks;
    
    public function hooks()
    {
        if (!$this->_hooks) {
            $service = [];
            foreach ($this->_definitions as $name => $definition) {
                $service[$name] = $this->{$name};
            }
            $this->_hooks = \Fine\Std\DynamicFacade(['subject' => $service]);
        }
        return $this->_hooks;
    }
    
}
