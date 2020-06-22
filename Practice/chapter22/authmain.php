<?php

session_start(); // The first thing you do in the script is call session_start(). This call loads in the session variable valid_user if it has been created.

if (isset($_POST['userid']) && isset($_POST['password'])) {

    // if the user has just tried to log in

    $userid = $_POST['userid'];
    $password = $_POST['password'];

    $db_conn = new mysqli('localhost', 'webauth', 'webauth', 'auth');


    if (mysqli_connect_errno()) {
        echo 'Connection to database failed:' . mysqli_connect_error();
        exit();
    }
    echo "C";


    // Here you connect to a MySQL database and issue a query to check the userid and password. If they are a matching pair in the database, you create the variable $_SESSION['valid_user'], which contains the userid for this particular user

    // $password = password_hash($password, PASSWORD_BCRYPT);
    /*$query = "select * from authorized_users where
            name='" . $userid . "' and
            password='".$password."'";*/

    $query = "select * from auth where name = '$userid' and password = '$password'";

    $result = $db_conn->query($query);

    if ($result->num_rows) {
        // if they are in the database register the user id
        $_SESSION['valid_user'] = $userid;
    }
    $db_conn->close();
}

?>

<!DOCTYPE html>

<html>

<head>

    <title>Home Page</title>

    <style type="text/css">
        fieldset {
            width: 50%;
            border: 2px solid #ff0000;
        }

        legend {
            font-weight: bold;
            font-size: 125%;
        }

        label {
            width: 125px;
            float: left;
            text-align: left;
            font-weight: bold;
        }

        input {
            border: 1px solid #000;
            padding: 3px;
        }

        button {
            margin-top: 12px;
        }
    </style>

</head>

<body>
    <h1>Home Page</h1>
    <?php

    // The script’s activities revolve around the valid_user session variable. The basic idea is that if someone logs in successfully, you will register a session variable called $_SESSION['valid_user'] that contains his or her userid.

    if (isset($_SESSION['valid_user'])) { // Because you now know who the user is, you don’t need to show him or her the login form again. Instead, you can tell the user you know who he or she is and give him or her the option to log out
        echo '<p>You are logged in as: ' . $_SESSION['valid_user'] . ' <br />';
        echo '<a href="logout.php">Log out</a></p>';
    } else {
        if (isset($userid)) { // If you tried to log the user in and failed for some reason, you’ll have a userid but not a $_SESSION['valid_user'] variable, so you can give him or her an error message

            // if they've tried and failed to log in
            echo '<p>Could not log you in.</p>';
        } else {

            // they have not tried to log in yet or have logged out
            echo '<p>You are not logged in.</p>';
        }


        // In the first pass through the script, none of the if conditions apply, so the user falls through to the end of the script, where you tell the user that he or she is not logged in and provide him or her with a form to do so

        // provide form to log in
        echo '<form action="authmain.php" method="post">'; // 
        echo '<fieldset>';
        echo '<legend>Login Now!</legend>';
        echo '<p><label for="userid">UserID:</label>';
        echo '<input type="text" name="userid" id="userid" size="30"/></p>';
        echo '<p><label for="password">Password:</label>';
        echo '<input type="password" name="password" id="password" size="30"/></p>';
        echo '</fieldset>';
        echo '<button type="submit" name="login">Login</button>';
        echo '</form>';

        // When the user clicks the submit button on the form, this script is reinvoked, and you start again from the top. This time, you will have a userid and password to authenticate, stored as $_POST['userid'] and $_POST['password']. If these variables are set, you go into the authentication block:
    }

    ?>
    <p><a href="members_only.php">Go to Members Section</a></p>
</body>

</html>