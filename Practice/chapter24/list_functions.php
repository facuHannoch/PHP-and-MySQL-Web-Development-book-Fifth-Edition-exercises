<?php

/**
 * You can easily see what function sets are available and what functions are available in each of those sets by using the get_loaded_extensions() and get_extension_funcs() functions.
 * 
 * The get_loaded_extensions() function returns an array of all the function sets currently available to PHP. Given the name of a particular function set or extension, get_extension_funcs() returns an array of the functions in that set.
 * 
 */
echo 'Function sets supported in this install are: <br/>';

$extensions = get_loaded_extensions();

foreach ($extensions as $each_ext) {
    echo $each_ext . '<br/>';
    echo '<ul>';
    $ext_funcs = get_extension_funcs($each_ext);
    foreach ($ext_funcs as $func) {
        echo '<li>' . $func . '</li>';
    }
    echo '</ul>';
}

// Note that the get_loaded_extensions() function doesn’t take any parameters, and the get_extension_funcs() function takes the name of the extension as its only parameter.

// This information can be helpful if you are trying to tell whether you have successfully installed an extension or if you are trying to write portable code that generates useful diagnostic messages when installing.

?>