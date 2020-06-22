<?php

session_start();

?>


<!DOCTYPE html>
<html>

<head>
    <title>Members Only</title>
</head>

<body>

    <h1>Members Only</h1>

    <?php

    // This code starts a session and checks whether the current session contains a registered user by checking whether the value of $_SESSION['valid_user'] is set. If the user is logged in, you show him or her the members’ content; otherwise, you tell the user that he or she is not authorized.

    // check session variable
    if (isset($_SESSION['valid_user'])) {

        echo '<p>You are logged in as ' . $_SESSION['valid_user'] . '</p>';
        echo '<p><em>Members-Only content goes here.</em></p>';
    } else {

        echo '<p>You are not logged in.</p>';
        echo '<p>Only logged in members may see this page.</p>';
    }
    ?>

    <p><a href="authmain.php">Back to Home Page</a></p>

</body>

</html>