<?php
class accessClass
{
    private $privAttribute = "I am Private"; //  The private access modifier means that the marked item can be directly accessed only from inside the class.
    // Items that are private will not be inherited.
    protected $protecAttribute = "I am Protected"; // The protected access modifier means that the marked item can be accessed only from inside the class and in any subclasses. It also exists in any subclasses.
    public $publicAttribute = "I am Public"; // Items that are public can be accessed from inside or outside the class.
    /** $anotherPublicAttribute = "I am Public";
      In most cases, you will want to make all class attributes private.
     */

    function operation($param)
    {
        echo "you said me $param";
        echo '<br/>';
    }
    final function finalOperation($param) // When you use the keyword final in front of a function declaration, that function cannot be overridden in any subclasses.
    {
        echo "who is $param is you";
        echo '<br/>';
    }

    function __get($name) // __get() takes one parameter—the name of an attribute—and returns the value of that attribute.
    {
        if ($name != "privAttribute") // declaring these methods, we can assure that when the data is required, will always pass for here, so we will be able to do one thing or another depending of what the program is asking for.
            return $this->$name;
        echo "<br/> You have been check, boy <br/>";
    }

    function __set($name, $value) // __set() function takes two parameters: the name of an attribute and the value you want to set it to.
    {
        $this->$name = $value;
    }
    /**
    // you can then use the __get() and __set() functions to check and set the value of any attributes that are otherwise inaccessible. These functions will not be used, even if declared, when accessing attributes declared to be public.
     * It is necessary to declare the get to be able to access the private variables. Otherwise, PHP will throw an error saying that it cannot access private property.

     The reason for providing accessor functions is simple: You then have only one section of code that accesses that particular attribute.

     With only a single access point, you can implement validity checks to make sure that only sensible data is being stored.

     */ // the /** */ document things in PHP, like functions.
}
class subAccess extends accessClass
{ // To specify that one class is to be a subclass of another, you can use the extends keyword.
    function operation($param)
    {
        parent::operation($param);
        echo "you said me $param, $param";
        echo '<br/>';
    }
    // function finalOperation($param) // this is not possible, because the operation method (inherited by the accessClass parent) was declared as final, so that operation cannot be overriden.
    // {
    //     echo "you said me $param, $param" . '<br/>';
    // }

    // It is important to note that inheritance works in only one direction. The subclass or child inherits features from its parent or superclass, but the parent does not take on features of the child.
}
$access = new accessClass();
$privAttribute = $access->privAttribute;
echo $access->privAttribute;
echo '<br/>';

$access = new accessClass();
$subAccess = new subAccess();

$access->operation("Gay");
$subAccess->operation("Gay");
