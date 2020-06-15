<?php

/** 
  Method overloading is common in many object-oriented languages but is not as useful in PHP because you tend to use flexible types and the (easy-to-implement) optional function parameters instead.
 */
class overload
{
    public function __call($method, $p) // The __call() method should take two parameters. The first contains the name of the method being invoked, and the second contains an array of the parameters passed to that method. You can then decide for yourself which underlying method to call. In this case, if an object is passed to method display(), you call the underlying displayObject() method; if an array is passed, you call displayArray(); and if something else is passed, you call displayScalar().

    {
        if ($method == "display") {
            if (is_object($p[0])) {
                $this->displayObject($p[0]);
            } else if (is_array($p[0])) {
                $this->displayArray($p[0]);
            } else {
                $this->displayScalar($p[0]);
            }
        }
    }
    public function __callstatic($functionName, $parameters)
    {
        echo 'I was not declared';
    }
}

$ov = new overload(); // Note that you do not need any underlying implementation of the display() method for this code to work.
$ov->display(array(1, 2, 3));
$ov->display('cat');

// PHP 5.3 introduced a similar magic method named __callStatic(). It works similarly to __call() except that it will be invoked when an inaccessible method is invoked via a static context, for example,
overload::display();
