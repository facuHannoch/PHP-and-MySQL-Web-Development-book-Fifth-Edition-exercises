<?php

/**
 * PHP allows you to set how fussy it should be with errors. You can modify what types of events generate messages. By default, PHP reports all errors other than notices.
 * 
 * The error reporting level is assigned using a set of predefined constants
 * 
 * Each constant represents a type of error that can be reported or ignored. If, for instance, you specify the error level as E_ERROR, only fatal errors will be reported. These constants can be combined using binary arithmetic, to produce different error levels.
 * 
 * The ampersand (&) is the bitwise AND operator and the tilde (~) is the bitwise NOT operator.
 * To combine differents levels togheter you can use the OR operator (|);
 * 
 * You can set the error reporting settings globally, in your php.ini file or on a per-script basis.
 */


// turn off error reporting
$old_level = error_reporting(0); // You do not have to keep PHP’s default error handling behavior or even use the same settings for all files. To change the error reporting level for the current script, you can call the function error_reporting().
// Passing an error report constant, or a combination of them, sets the level in the same way that the similar directive in php.ini does. The function returns the previous error reporting level.

echo 3 / 0;

error_reporting($old_level);

/**
 * This code snippet turns off error reporting, allowing you to execute some code that is likely to generate warnings that you do not want to see.
 * 
  Turning off error reporting permanently is a bad idea because it makes finding your coding errors and fixing them more difficult.
 */

 ?>