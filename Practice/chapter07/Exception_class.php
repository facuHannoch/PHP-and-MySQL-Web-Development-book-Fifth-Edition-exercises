<?php
class Exception
// The main reason we are looking at this class definition is to note that most of the public methods are final: That means you cannot override them. You can create your own subclass Exceptions, but you cannot change the behavior of the basic methods. Note that you can override the __toString() function, so you can change ssthe way the exception is displayed. You can also add your own methods.
{

    protected $message = 'Unknown exception';   // exception message

    private   $string;                          // __toString cache

    protected $code = 0;                        // user defined exception code

    protected $file;                            // source filename of exception

    protected $line;                            // source line of exception

    private   $trace;                           // backtrace

    private   $previous;                        // previous exception if nestedexception



    public function __construct($message = null, $code = 0, Exception $previous = null);



    final private function __clone();           // Inhibits cloning of exceptions.



    final public  function getMessage();        // message of exception

    final public  function getCode();           // code of exception

    final public  function getFile();           // source filename

    final public  function getLine();           // source line

    final public  function getTrace();          // an array of the backtrace()

    final public  function getPrevious();       // previous exception

    final public  function getTraceAsString();  // formatted string of trace



    /* Overrideable */

    public function __toString();               // formatted string for display

}
