<?php
// Any class that contains abstract methods must itself be abstract
abstract class superCallerAbstract
{
    private $name = 'You';
    abstract function call();
    function sayHello()
    {
        echo '<br/> Hello... ' . $this->name . ' <br/>';
    }
    /**
     * You can also declare an abstract class without any specifically abstract methods.
     * 
     * The main use of abstract methods and classes is in a complex class hierarchy where you want to make sure each subclass contains and overrides some particular method; this can also be done with an interface.
     */
}
