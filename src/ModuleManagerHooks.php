<?php

namespace Fine\Application;

class ModuleManagerHooks 
{

    /**
     * @var array
     */
    protected $_subject;

    public function __construct($subjects)
    {
        $this->_subject = $subjects;
    }

    public function __call($name, $args)
    {
        foreach ($this->_subject as $subject) {
            if (!method_exists($subject, $name)) {
                continue;
            }
            call_user_func_array([$subject, $name], $args);
        }

        return $args[0];
    }

    public function __get($name)
    {
        $subjects = array();
        foreach ($this->_subject as $subject) {
            if (!isset($subject->$name)) {
                continue;
            }
            $subjects[]  = $subject->$name;
        }
        return $this->$name = new ModuleManagerHooks($subjects);
    }

}
