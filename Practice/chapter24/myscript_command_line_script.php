<?php

/**
 * You can usefully write or download many small programs and run them on the command line. If you are on a Unix system, these programs are usually written in a shell scripting language or Perl. If you are on a Windows system, they are usually written as a batch file.
 * 
 *  The same text processing facilities that make it a strong web language make it a strong command-line utility program.
 * 
  There are three ways to execute a PHP script at the command line: from a file, through a pipe, or directly on the command line.
 * 
 * To execute a PHP script in a file, make sure that the PHP executable (php or php.exe depending on your operating system) is in your path and call it with the name of script as an argument. Here’s an example:
 * php myscript.php
 * 
 * 
 * 
  To pass code through a pipe, you can run any program that generates a valid PHP script as output and pipe that to the php executable. The following example uses the program echo to give a one-line program:
 * 
 * echo '<?php for($i=1; $i<10; $i++) echo $i; ?>' | php
 * 
  the PHP code here is enclosed in PHP tags (<?php and ?>). Also note that this is the command-line program echo, not the PHP language construct.
 * 
 * 
 * 
  A one-line program of this nature would be easier to pass directly from the command line, as in this example:
 * 
 * php -r 'for($i=1; $i<10; $i++) echo $i;'
 * 
 * The PHP code passed in this string is not enclosed in PHP tags. If you do enclose the string in PHP tags, you will get a syntax error.
 */

 ?>