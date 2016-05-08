<?php

namespace Fine\Application;

use \Fine\Container\Container;

class HttpKernel
{
    
    protected $event;

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response) 
    {
        return $this->event()->setRequest($request)->setResponse($response)->run()->getResponse();
    }
    
    public function defineEvent($closure)
    {
        $this->event = $closure;
        return $this;
    }
    
}
