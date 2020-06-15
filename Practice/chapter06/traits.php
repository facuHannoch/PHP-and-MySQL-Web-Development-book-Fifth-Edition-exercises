<?php

/** 
 Traits are a way to get the best aspects of multiple inheritance without the associated pain. In a trait, you can group together functionality that may be reused in multiple classes. A class can combine multiple traits, and traits can inherit from one another. Traits are an excellent set of building blocks for code re-use.
 */
/** This set of functions are useful to frighten a person making he believe that you are going to call them
 * 
 * Use with caution
 */
trait theCaller // You create a trait the same way as a class, but using the keyword trait instead
{
    function callLater()
    {
        echo "I am going to call, eventually";
    }
    function callNow()
    {
        echo "Imma call now";
    }
}
trait theCaller2 // You create a trait the same way as a class, but using the keyword trait instead
{
    function callLater()
    {
        echo "I am going to call 2, eventually";
    }
    function callNow()
    {
        echo "Imma call now, 2";
    }
}
/**
 You can build traits that include or consist entirely of other traits. This allows for true horizontal composability. To do this, include a use statement inside a trait, just as you would inside a class.
 */
