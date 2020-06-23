<?php

/**
 * You can view the directives set in the php.ini file or change them for the life of a single script. This capability can be particularly useful, for example, in conjunction with the max_execution_time directive if you know your script will take some time to run.
 * 
 * You can access and change the directives using the twin functions ini_get() and ini_set().
 */

$old_max_execution_time = ini_set('max_execution_time', 130); // The ini_set() function takes two parameters. The first is the name of the configuration directive from php.ini that you would like to change, and the second is the value you would like to change it to. It returns the previous value of the directive.
// In this case, you reset the value from the default 30-second maximum time for a script to run to 120 seconds.

echo 'old timeout is ' . $old_max_execution_time . '<br/>';


$max_execution_time = ini_get('max_execution_time'); // The ini_get() function simply checks the value of a particular configuration directive. The directive name should be passed to it as a string. Here, it just checks that the value really did change.

echo 'new timeout is ' . $max_execution_time . '<br/>';

/**
 * Not all INI options can be set this way. Each option has a level at which it can be set. The possible levels are
 * 
 * PHP_INI_USER—You can change these values in your scripts with ini_set().
 * 
 * PHP_INI_PERDIR—You can change these values in php.ini or in .htaccess or httpd.conf files if using Apache. The fact that you can change them in .htaccess files means that you can change these values on a per-directory basis—hence the name.
 * 
 * PHP_INI_SYSTEM—You can change these values in the php.ini or httpd.conf files.
 * 
 * PHP_INI_ALL—You can change these values in any of the preceding ways—that is, in a script, in an .htaccess file, or in your httpd.conf or php.ini files.
 * 
 */

?>