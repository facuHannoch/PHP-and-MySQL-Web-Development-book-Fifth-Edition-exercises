<?php

/**
 * To use enviroment varaibles in PHP, there are two functions: getenv(), which enables you to retrieve environment variables, and putenv(), which enables you to set environment variables. Note that the environment we are talking about here is the environment in which PHP runs on the server.
 * 
 * You can get a list of all PHP’s environment variables by running phpinfo()
 * 
 * getenv("HTTP_REFERER");
 * returns the URL of the page from which the user came to the current page.
 * 
 * If you are a system administrator and would like to limit which environment variables programmers can set, you can use the safe_mode_allowed_env_vars directive in php.ini. When PHP runs in safe mode, users can set only environment variables whose prefixes are listed in this directive.
 * 
 * You can also set environment variables as required with putenv()
 * $home = "/home/nobody";
 * putenv (" HOME=$home ");
 */


$name = "Pepe";
putenv("NAME=$name");

echo getenv("name");
