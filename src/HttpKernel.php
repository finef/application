<?php

namespace Fine\Application;

use \Fine\Container\Container;

class HttpKernel
{
    
    protected $_eventFactory;

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response) 
    {
        $eventFactory = $this->_eventFactory;
        return $eventFactory()->setRequest($request)->setResponse($response)->run()->getResponse();
    }
    
    public function setEventFactory($closure)
    {
        $this->_eventFactory = $closure;
        return $this;
    }
    
}
