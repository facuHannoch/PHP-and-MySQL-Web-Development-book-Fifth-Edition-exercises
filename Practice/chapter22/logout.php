<?php

session_start(); // start a session

// store to test if they *were* logged in
$old_user = $_SESSION['valid_user']; // store the user’s old username

unset($_SESSION['valid_user']); // unset the valid_user variable

session_destroy(); // destroy the session

?>
<!DOCTYPE html>
<html>

<head>
    <title>Log Out</title>
</head>

<body>
    <h1>Log Out</h1>

    <?php

    if (!empty($old_user)) { // You then give the user a message that will be different if he or she was logged out or was not logged in to begin with.

        echo '<p>You have been logged out.</p>';
    } else {

        // if they weren't logged in but came to this page somehow
        echo '<p>You were not logged in, and so have not been logged out.</p>';
    }

    ?>
    <p><a href="authmain.php">Back to Home Page</a></p>

</body>

</html>