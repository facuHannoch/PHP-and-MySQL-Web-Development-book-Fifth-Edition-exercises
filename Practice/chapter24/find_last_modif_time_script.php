<?php

/**
 * Adding a last modification date to each page in a site is a fairly popular thing to do.
 * 
 * You can check the last modification date of a script with the getlastmod() (note the lack of underscores in the function name) function
 */
echo date('g:i a, j M Y', getlastmod());

// The function getlastmod() returns a Unix timestamp, which you can feed to date(), as done here, to produce a human-readable date.

?>
