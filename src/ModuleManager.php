<?php

namespace \Fine\Application;

class ModuleManager extends \Fine\Container\Container
{
    
    protected $_each;
    
    public function each()
    {
        if (!$this->_each) {
            $service = array();
            foreach ($this->_definitions as $name => $definition) {
                $service[$name] = $this->{$name};
            }
            $this->_each = \Fine\Std\DynamicFacade(array('subject' => $service));
        }
        return $this->_each;
    }
    
}
