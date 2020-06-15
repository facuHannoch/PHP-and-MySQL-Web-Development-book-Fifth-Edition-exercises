<?php

/**
 The idea of an interface is that it specifies a set of functions that must be implemented in classes that implement that interface. For instance, you might decide that you have a set of classes that need to be able to display themselves. Instead of having a parent class with a display() function that they all inherit from and override, you can implement an interface
 */
interface llamable
{
    /** This function should implement a echo that says "I am calable" 
     * asdvf
     * 
     This does not return anything
     */
    function llamable();
}
