<?php
/**
 * For some applications, measuring time in seconds is not precise enough to be useful. If you want to measure very short periods, such as the time taken to run some or all of a PHP script, you need to use the function microtime().
 * 
 * Although an optional parameter, it is useful to pass true to microtime(). When this optional parameter is provided, microtime() will return the time as a floating point value that is ready for whatever use you have in mind. The value is the same one returned by mktime(), time(), or date() but has a fractional component.
 */
echo number_format(microtime(true), 5, ".", '');

/** 
 * On older versions, you cannot request the result as a float. It is provided as a string. A call to microtime() without a parameter returns a string of this form " 0.88679500 1424141403". The first number is the fractional part, and the second number is the number of whole seconds elapsed since January 1, 1970.
 * 
  Dealing with numbers rather than strings is more useful, so it is easiest to call microtime() with the parameter true.
 */
?>