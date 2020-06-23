<?php

/**
  Exceptions allow functions to signal that an error has occurred and leave dealing with the error to an exception handler.
 * 
 * You can also provide your own error handlers to catch errors.
 * 
 * The function set_error_handler() lets you provide a function to be called when user-level errors, warnings, and notices occur. You call set_error_handler() with the name of the function you want to use as your error handler.
 * 
 * Your error handling function must take two parameters: an error type and an error message. Based on these two variables, your function can decide how to handle the error. The error type must be one of the defined error-type constants. The error message is a descriptive string.
 * 
 * 
  Having told PHP to use a function called my_error_handler(), you must then provide a function with that name. This function must have the following prototype:
 * 
  my_error_handling(int error_type, string error_msg [, string errfile [, int errline [, array errcontext]]])
 * 
 * What it actually does, however, is up to you.
 * 
  The parameters passed to your handler function are:
   • The error type
   • The error message
   • The file the error occurred in
   • The line the error occurred on
   • The symbol table—that is, a set of all the variables and their values at the time the error occurred
 * 
 * Logical actions might include
 * Displaying the error message provided
 * Logging the information in a log file
 * Emailing the error to an address
 * Terminating the script with a call to exit
 */


$pepe = "soy pepe";
$pepe = "Yo soy el mas pepe"; // This variable will also be in the array passed to the error handler function, with the last value assigned to it before the error is triggered

// The error handler function
function myErrorHandler($errno, $errstr, $errfile, $errline)
{
    echo "<p><strong>ERROR:</strong> " . $errstr . "<br/>
        Please try again, or contact us and tell us that the
        error occurred in line " . $errline . " of file " . $errfile . "
        so that we can investigate further.</p>";

    if (($errno == E_USER_ERROR) || ($errno == E_ERROR)) {
        echo "<p>Fatal error. Program ending.</p>";
        exit;
    }
    echo "<hr/>";
}

// Set the error handler
set_error_handler('myErrorHandler');


//trigger different levels of error
trigger_error('Trigger function called.', E_USER_NOTICE);
fopen('nofile', 'r');
trigger_error('This computer is beige.', E_USER_WARNING);
include('nofile');
trigger_error('This computer will self destruct in 15 seconds.', E_USER_ERROR);

/**
 * This custom error handler does not do any more than the default behavior. Because you write this code, you can make it do anything. You have a choice about what to tell your visitors when something goes wrong and how to present that information so that it fits the rest of the site. More importantly, you have the flexibility to decide what happens.
 * 
 * It is important to note that your error handler will not have the responsibility for dealing with all error types. Some errors, such as parse errors and fatal runtime errors, still trigger the default behavior. If this behavior concerns you, make sure that you check parameters carefully before passing them to a function that can generate fatal errors and trigger your own E_USER_ERROR level error if your parameters are going to cause failure.
 * 
  If your error handler returns an explicit false value, PHP’s built-in error handler will be invoked. This way, you can handle the E_USER_* errors yourself and let the built-in handler deal with the regular errors.
 */

 ?>