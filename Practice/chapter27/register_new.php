<?php

// include function files for this application
require_once('bookmark_fns.php');

//create short variable names
$email = $_POST['email'];
$username = $_POST['username'];
$passwd = $_POST['passwd'];
$passwd2 = $_POST['passwd2'];

// start session which may be needed later
// start it now because it must go before headers
session_start();

try { // The body of the script takes place in a try block because you check a number of conditions. If any of them fail, execution will fall through to the catch block


    // validate the input data from the user 


    // check forms filled in
    if (!filled_out($_POST)) { // This function is declared in the function library in the file data_valid_fns.php.
        throw new Exception('You have not filled the form out correctly –
          please go back and try again.');
    }

    // email address not valid
    if (!valid_email($email)) { //  This function is declared in the data_valid_fns.php library
        throw new Exception('That is not a valid email address. Please go back and try again.');
    }

    // passwords not the same
    if ($passwd != $passwd2) {
        throw new Exception('The passwords you entered do not match – please go back and try again.');
    }

    // check password length is ok
    // ok if username truncates, but passwords will get
    // munged if they are too long.

    if ((strlen($passwd) < 6) || (strlen($passwd) > 16)) {
        // the password should be at least six characters long to make it harder to guess, and the username should be fewer than 17 characters so that it will fit in the database field that has been defined to hold the username. Note that the maximum length of the password is not restricted in this way because it is stored as an SHA1 hash, which will always be 40 characters long no matter the length of the password.
        throw new Exception('Your password must be between 6 and 16 characters. Please go back and try again.');
    }



    // attempt to register

    // this function can also throw an exception
    register($username, $email, $passwd); // you call the register() function with the username, email address, and password that were entered. If this call succeeds, you register the username as a session variable and provide the user with a link to the main members’ page. (If it fails, this function will throw an exception that will be caught in the catch block.)

    // register session variable
    $_SESSION['valid_user'] = $username; // When the user is registered, you create his username as a session variable

    // provide link to members page
    do_html_header('Registration successful');
    echo 'Your registration was successful.  Go to the members page to start
          setting up your bookmarks!';
    do_html_url('member.php', 'Go to members page');

    // end page
    do_html_footer();

} catch (Exception $e) {
    do_html_header('Problem:');
    echo $e->getMessage();
    do_html_footer();
    exit;
}
