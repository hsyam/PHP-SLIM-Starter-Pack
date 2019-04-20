<?php


namespace App\Controllers ;

class Controller {
    public $container ;
    public function __construct($container)
    {
        $this->container = $container ;
    }

    public function __get($name)
    {
        return $this->container[$name];
    }
}