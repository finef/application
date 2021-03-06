<?php


interface f_c_intreface 
{
    
    public function request(f_controller_request_interface $request = null);
    public function response(f_controller_response_interface $response = null);
    public function dispatch();
}   

interface f_c_front_interface
{
    public function run();
}
    
class f_c_action
{
    
    public function dispatch() 
    {
        
        $action = $this->request()->param('action');
        
        if (strlen($action) === 0 || !method_exists($this, "{$action}Action")) {
            throw new f_controller_exception_notFound();
        }
        
        $this->{"{$action}Action"}();
    
    }
    
}
    
class f_c_action_viewAutoRender
{
    
    
    public function dispatch()
    {
        parent::dispatch();
        
        $this->app()->response()->body($this->app()->view()->render(
            "app/view/script" 
            . "/" . $this->app()->request()->param('controller')
            . "/" . $this->app()->request()->param('action')
        ));
        
//        $this->app()->module()->app->

    }
    
}

interface f_c_router_interface
{

}

interface f_c_route_interface
{
    public function match(f_c_request_interface $request); # -> boolean
    public function build($param, $type); # -> string
}

class f_c_route
{
    
}


//app/module/app/










