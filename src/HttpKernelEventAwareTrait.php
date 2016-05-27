<?php

namespace Fine\Application;

trait HttpKernelEventAwareTrait
{
 
    protected $_httpKernelEvent;
            
    public function setHttpKernelEvent(Event $event)
    {
        $this->_httpKernelEvent = $event;
        return $this;
    }

}
