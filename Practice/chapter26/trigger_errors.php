<?php

/**
 * The function trigger_error() can be used to trigger your own errors. Errors created in this way are handled in the same way as regular PHP errors.
 * 
 * The function requires an error message and can optionally be given an error type. The error type needs to be one of E_USER_ERROR, E_USER_WARNING, or E_USER_NOTICE. If you do not specify a type, the default is E_USER_NOTICE.
 */

trigger_error('This computer will self destruct in 15 seconds', E_USER_WARNING);

?>