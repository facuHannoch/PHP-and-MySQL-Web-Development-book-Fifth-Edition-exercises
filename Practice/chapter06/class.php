<?php
class classname
// To be useful, classes need attributes and operations. 
{
    // You create attributes by declaring variables within a class definition using keywords that match their visibility: public, private, or protected.
    public $attribute;
    public $attrribute;
    const name = "Hello";

    // You create operations by declaring functions within the class definition.
    function operation()
    {
    }

    function operation2($param1, $param2)
    {
    }

    function __construct($param)
    { // A constructor is declared in the same way as other operations, but has the special name __construct(). Although you can manually call the constructor, its main purpose is to be called automatically when an object is created.
        echo 'Constructor of classname called with parameter ' . $param . '<br/>';
    }
    // It normally performs useful initialization tasks such as setting attributes to sensible starting values or creating other objects needed by this object.

    function __destruct()
    { // The opposite of a constructor is a destructor. They allow you to have some functionality that will be executed just before a class is destroyed, which will occur automatically when all references to a class have been unset or fallen out of scope.
        // Destructors cannot take parameters.
        echo "Destroyed";
    }

    /**
     * function __constructor($s){
     *     There is no function overloading like in Java 
     *     You cannot write the same name of the function twice but with different parameters to differentiate one from each other, as you do can do with languages like Java, for example.
     * 
     * }
     */

    function operation3($param)
    {
        $this->attribute = $param; // Within a class, you have access to a special pointer called $this. If an attribute of your current class is called $attribute, you refer to it as $this->attribute when either setting or accessing the variable from an operation within the class.
        echo $this->attribute;
        return 1;
    }

    function __clone()
    {
        echo '<br/> I have been cloned <br/>';
    }
}
$a = new classname("Pep");
$b = new classname("Pepito");
// $c = new classname(); // If you attempt to create an object like this, you will get a warning
// after the warning and notice, the object is still created, without a value in the parameter

// After you have declared a class, you need to create an object—a particular individual that is a member of the class—to work with. This is also known as creating an instance of or instantiating a class. You create an object by using the new keyword. When you do so, you need to specify what class your object will be an instance of and provide any parameters required by the constructor.
$a = new classname("Pep");
$a->attribute = "value"; // Whether you can access an attribute from outside the class is determined by access modifiers
echo $a->attribute;

$a->operation(); // You then call operations the same way that you call other functions: by using their name and placing any parameters that they need in brackets. Because these operations belong to an object rather than normal functions, you need to specify to which object they belong. The object name is used in the same way as you would use it to access an object’s attributes
$a->operation3("El Pep");

// If the operations return something, you can capture that return data

$x = $a->operation();
$y = $a->operation2(12, "test");
echo '<br/>';

echo "classname::name = " . classname::name; //You can access the per-class constant by using the :: operator to specify the class the constant belongs to


// Cloning objects
$c = clone $a;
// creates a copy of object $b of the same class, with the same attribute values.

// You can also change this behavior. If you need nondefault behavior from clone, you need to create a method in the base class called __clone(). This method is similar to a constructor or destructor in that you do not call it directly. It is invoked when the clone keyword is used as shown here. Within the __clone() method, you can then define exactly the copying behavior that you want.

// The nice thing about __clone() is that it will be called after an exact copy has been made using the default behavior, so at that stage you are able to change only the things you want to change.

// The most common functionality to add to __clone() is code to ensure that attributes of the class that are handled as references are copied correctly. If you set out to clone a class that contains a reference to an object, you are probably expecting a second copy of that object rather than a second reference to the same one, so it would make sense to add this to __clone().

// You may also choose to change nothing but perform some other action, such as updating an underlying database record relating to the class.
