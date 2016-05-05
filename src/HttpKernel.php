<?php

namespace Fine\Application;

use \Fine\Container\Container;

class HttpKernel
{
    
    protected $event;

    public function __invoke(RequestInterface $request, ResponseInterface $response) 
    {
        return $this->handle($request, $response);
    }
    
    public function defineEvent($closure)
    {
        $this->event = $closure;
        return $this;
    }
    
    public function handle(RequestInterface $request, ResponseInterface $response)
    {
        return $this->event()->setRequest($request)->setResponse($response)->run()->getResponse();
    }
    
    public function helper(RequestInterface $request, ResponseInterface $response)
    {
        return $this->handle($request, $response);
    }


}
