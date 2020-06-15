<?php
// If you implement a function called __toString() in your class, it will be called when you try to print the class
class Person
{
    public $var = "hello";
    function __toString()
    {
        return 'Hello';
    }
}
$string = new Person();
echo var_export($string); // The var_export() function prints out all the attribute values in the class.
echo '<br/>';
echo $string;
