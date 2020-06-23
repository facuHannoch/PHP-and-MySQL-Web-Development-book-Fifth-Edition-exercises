<?php

/**
 * The language construct exit is used to stop execution of a script at a certain point. It does not return anything. You can alternatively use its alias, die().
 */

// For a slightly more useful termination to your script, you can pass a parameter to exit(). You can use this approach to output an error message or execute a function before terminating a script.
exit("Script ending now...");

// More commonly, exit() or die() is combined using or with a statement that might fail, such as opening a file or connecting to a database:
mysqli_query($db, $query) or die('Could not execute query');

// In the example above, the string “Could not execute query.” will be printed to the screen if the return value of the mysql_query($query) function is false. Additionally, instead of just printing an error message, you can run one last function before the script terminates:

function err_msg($db)
{
    return 'MySQL error was: ' . mysqli_error($db);
}

mysqli_query($db, $query) or die(err_msg($db));

?>