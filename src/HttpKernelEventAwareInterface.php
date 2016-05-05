<?php

namespace Fine\Application;

use \Fine\Event\Event;

interface HttpKernelEventAwareInterface 
{
    
    public function setHttpKernelEvent(Event $event);
    
}