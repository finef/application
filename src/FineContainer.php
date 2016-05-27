<?php

namespace Fine\Application;

use \Fine\Container;

class FineContainer extends Container implements FineAwareInterface
{
    
    use FineAwareTrait;
    use FineDistributeTrait;
    
}
