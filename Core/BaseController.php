<?php

namespace Core;

abstract class BaseController{

    /**
     * Parameters from the matched route
     * @var array
     */
    protected $route_params = [];

    /**
     * an associative array of hooks that are called prior to
     * the specified list of actions.
     * @var array
     */
    protected static $before_action = [];

    /**
     * an associative array of hooks that are called after
     * the specified list of actions.
     * @var array
     */
    protected static $after_action = [];

    /**
     * Class constructor
     *
     * @param array $route_params  Parameters from the route
     *
     * @return void
     */
    public function __construct($route_params){
        $this->route_params = $route_params;
    }


    public function __call($method, $args){
        //before actions
        $this->call_hooks_for_method(static::$before_action, $method);
        
        //call the method
        call_user_func_array([$this, "{$method}Action"], $args);
        //after action
        $this->call_hooks_for_method(static::$after_action, $method);

    
    }
    protected function call_hooks_for_method($hooks, $method){
        foreach($hooks as $hook => $actions){
            if(empty($actions) || in_array($method, $actions)){
                call_user_func_array([$this, $hook], []);
            }
        }
    }
}
