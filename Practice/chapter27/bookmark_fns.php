<?php

// We can include this file in all our files
// this way, every file will contain all our functions and exceptions

require_once('data_valid_fns.php');

require_once('db_fns.php');

require_once('user_auth_fns.php');

require_once('output_fns.php');

require_once('url_fns.php');

// This file is just a container for the five other include files you will use in this application. We structured the project like this because the functions fall into logical groups. Some of these groups might be useful for other projects, so we put each function group into a different file so you will know where to find it when you want it again. We constructed the bookmark_fns.php file because you will use most of the five function files in most of the scripts. Including this one file in each script is easier than having five require statements in each script.

?>
