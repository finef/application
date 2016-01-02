<?php

namespace \Fine\Application;

interface ControllerInterface
{

    public function setRequest();
    public function getRequest();

    public function setResponse();
    public function getResponse();

    public function dispatch();

}
