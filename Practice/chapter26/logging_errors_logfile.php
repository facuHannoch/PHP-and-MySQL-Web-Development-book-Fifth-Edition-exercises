<?php

/**
  PHP allows you to log your errors to a log file rather than relying on stderr and displaying errors on the web page itself. This has the benefit of making your web applications look cleaner and also more secure. PHP errors can provide information about the path, database schema, and other sensitive information. By logging errors to a file, you ensure that information remains secure.
 * 
  To enable logging, you need to change the php.ini file to modify the error log directive.
 * For example, to send all your errors to /var/log/php-errors.log, write:
 *   error_log = /var/log/php-errors.log
 * 
  Then make sure that the display_errors directive is turned off so that no errors are sent to end users.
 *   display_errors = Off
 * 
  Then restart your web server so that your changes take effect; once complete, you can view the log file at your convenience.
 */

trigger_error("An error happened");

?>