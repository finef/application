<?php

namespace Fine\Application;

class Controller implements ControllerInterface
{
    
    protected $_request;
    
    protected $_response;

    public function setRequest(ServerRequestInterface $request)
    {
        $this->_request = $request;
        return $this;
    }
    
    public function getRequest()
    {
        return $this->_request;
    }

    public function setResponse(ServerRequestInterface $response)
    {
        $this->_response = $response;
        return $this;
    }
    
    public function getResponse()
    {
        return $this->_response;
    }

    public function dispatch(ServerRequestInterface $request, ResponseInterface $response)
    {
        
        $this->setRequest($request);
        $this->setResponse($response);
        
        $method = $request->getAttribute('action', 'index') . 'Action';
        
        if (!method_exists($this, $method)) {
            throw new Http404Exception();
        }
        
        $result = call_user_func([$this, $method]);
        
        if ($result) {
            $this->setResponse($result);
        }
        
        return $this->getResponse();
    }
    
}