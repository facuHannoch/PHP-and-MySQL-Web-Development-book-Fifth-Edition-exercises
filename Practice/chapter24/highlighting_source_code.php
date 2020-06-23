<?php

/**
 * PHP comes with a built-in syntax highlighter, similar to many IDEs. In particular, it is useful for sharing code with others or presenting it for discussion on a web page.
 * 
 * The functions show_source() and highlight_file() are the same. (The show_source() function is actually an alias for highlight_file().) Both of these functions accept a filename as the parameter. (This file should be a PHP file; otherwise, you won’t get a very meaningful result.) Consider this example:
 * 
 */

show_source('list_functions.php');

/**
 * The file is echoed to the browser with the text highlighted in various colors depending on whether it is a string, a comment, a keyword, or HTML. The output is printed on a background color. Content that doesn’t fit into any of these categories is printed in a default color.
 * 
 * The highlight_string() function works similarly, but it takes a string as parameter and prints it to the browser in a syntax-highlighted format.
 * 
 * You can set the colors for syntax highlighting in your php.ini file. The section you want to change looks like this:
 * 
 * ; Colors for Syntax Highlighting mode
 * highlighting.string = #DD0000
 * highlighting.comment = FF9900
 * highlighting.keyword = #007700
 * 
 * The colors are in standard HTML RGB format
 */

 ?>