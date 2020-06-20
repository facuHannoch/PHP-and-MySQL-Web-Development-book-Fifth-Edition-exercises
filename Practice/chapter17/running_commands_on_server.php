<?php

/**
 * The functions available for running commands on the server are useful when you want to provide a web-based front end to an existing command-line–based system. You can use four main techniques to execute a command on the web server. They are all relatively similar, but there are some minor differences:
 * 
 * 
  exec ()
 * string exec (string command [, array &result [, int &return_value]])
 * 
 * You pass in the command that you would like executed
 * 
 * The exec() function has no direct output. It returns the last line of the result of the command.
 * If you pass in a variable as result, you will get back an array of strings representing each line of the output. If you pass in a variable as return_value, you will get the return code.
 * 
 * 
 * 
  passthru ()
 * void passthru (string command [, int return_value])
 * 
 * The passthru() function directly echoes its output through to the browser. (This functionality is useful if the output is binary—for example, some kind of image data.) It returns nothing.
 * The parameters work the same way as exec()’s parameters do.
 * 
 * 
 * 
  system ()
 * string system (string command [, int return_value])
 * 
 * The system() function echoes the output of the command to the browser. It tries to flush the output after each line (assuming you are running PHP as a server module), which distinguishes it from passthru(). It returns the last line of the output (upon success) or false (upon failure).
 * The parameters work the same way as in the other functions listed above.
 * 
 * 
 * 
  Backticks
 * They are actually execution operators.
 * They have no direct output. The result of executing the command is returned as a string, which can then be echoed or whatever you like.
 * 
 * If you have more complicated needs, you can also use popen(), proc_open(), and proc_close() functions, which fork external processes and pipe data to and from them.
 * 
 * 
 * examples of these commands in progex.php
 */
