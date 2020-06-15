<?php

/**
  Another of the special functions in PHP is __autoload(). It is not a class method but a stand-alone function; that is, you declare it outside any class declaration. If you implement it, it will be automatically called when you attempt to instantiate a class that has not been declared.

  The main use of __autoload() is to try to include or require any files needed to instantiate the required class.
 */
function __autoload($name)
{
  include_once $name . ".php";
  // This implementation tries to include a file with the same name as the class.
}
