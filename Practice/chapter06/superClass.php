<?php

/**
 NOTE: A trait’s methods override inherited methods, but the current’s class methods override a trait’s methods.
 */
class superClass extends superCallerAbstract implements llamable
{
    /**
      You can combine multiple traits and when there are methods with the same names, you can explicitly specify which trait’s functionality you wish to use.
     */
    use theCaller, theCaller2 { // We use the two different logging traits by listing them in the use clause. Because each of the traits implements the same logmessage() method, we must specify which one to use. If you don’t specify this, PHP will generate a fatal error as it will not be able to resolve the conflict.
        // You can specify which one to use by using the insteadof keyword
        theCaller::callNow insteadof theCaller2; // This line explicitly tells PHP to use the callNow() method from the theCaller trait. 
        theCaller2::callNow as private theBestCallYouEverMade; // However, we’d also like access to the callNow() method from the theCaller2 trait. In order to do so, we rename it using the as keyword.
        theCaller::callLater insteadof theCaller2;
        theCaller2::callLater as theBestCallYouEverMade2;
    }
    function llamable()
    {
        echo "I am calable ";
        $this->callNow();
    }
    function call()
    {
        echo "I'm calling...";
    }
}

/**
 The key difference between interfaces and traits is that traits include an implementation, as opposed to merely specifying an interface that must be implemented.
 */

?>
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
?>

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
 You can combine multiple traits and when there are methods with the same names, you can explicitly specify which trait’s functionality you wish to use
 */
?>

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
?>
<?php
$superClass = new superClass();
$superClass->callLater();
$superClass->sayHello();
?>