<?php

// include function files for this application
require_once('bookmark_fns.php');

session_start();

//create short variable names
if (!isset($_POST['username'])) {
    //if not isset -> set with dummy value
    $_POST['username'] = " ";
}

$username = $_POST['username'];

if (!isset($_POST['passwd'])) {
    //if not isset -> set with dummy value
    $_POST['passwd'] = " ";
}

$passwd = $_POST['passwd'];

if ($username && $passwd) {

    // they have just tried logging in

    try {

        login($username, $passwd);

        // if they are in the database register the user id
        $_SESSION['valid_user'] = $username;
    } catch (Exception $e) {

        // unsuccessful login
        do_html_header('Problem:');
        echo 'You could not be logged in.<br>
          You must be logged in to view this page.';

        do_html_url('login.php', 'Login');
        do_html_footer();

        exit;
    }
}

// If all goes well, you then show the user the members’ page:

do_html_header('Home');
check_valid_user(); // The check_valid_user() function checks that the current user has a registered session. This is aimed at users who have not just logged in, but are mid-session. It is from user_auth_fns.php

// get the bookmarks this user has saved
if ($url_array = get_user_urls($_SESSION['valid_user'])) { // get_user_urls() function gets a user’s bookmarks from the database. It is from url_fns.php
    display_user_urls($url_array); // display_user_urls() outputs the bookmarks to the browser in a table. It is from output_fns.php
}


// give menu of options

display_user_menu(); // The member.php script ends the page by displaying a menu with the display_user_menu() function.

do_html_footer();
?>