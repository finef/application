<?php

namespace Fine\Application;

trait FineDistributeTrait 
{
   
    public function __extend($name, $service)
    {
        if ($service instanceof FineAwareInterface) {
            $service->setFine($this->_fine);
        }
        
        return $service;
    }
    
}
