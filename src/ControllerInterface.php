<?php

namespace \Fine\Application;

interface ControllerInterface
{

    public function dispatch(ServerRequestInterface $request, ResponseInterface $response);

}
