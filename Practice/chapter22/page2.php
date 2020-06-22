<?php

session_start(); // After you call session_start(), the variable $_SESSION ['session_var'] is available with its previously stored value

echo 'The content of $_SESSION[\'session_var\'] is '
    . $_SESSION['session_var'] . '<br/>';

unset($_SESSION['session_var']); // After you have used the variable in this listing, you unset it. The session still exists, but the variable $_SESSION['session_var'] no longer exists.

?>

<p><a href="page3.php">Next Page</a></p>