<?php

session_start();


echo 'The content of $_SESSION[\'session_var\'] is '
    . $_SESSION['session_var'] . '<br/>'; //  you no longer have access to the persistent value of $_SESSION['session_var'], because it was unset in page2.php

session_destroy(); // You finish your script by calling session_destroy() to dispose of the session ID.

?>