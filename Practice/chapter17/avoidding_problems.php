<?php
//  To mitigate the risk of users “directory surfing” on your server, you can use the basename() function to modify the names of incoming files. This function will strip off any directory paths that are passed in as part of the filename, which is a common attack that is used to place a file in a different directory on your server.

$path = "/home/httpd/html/index.php";

$file1 = basename($uploaded_file);

$file2 = basename($file1, ".php");

print $file1 . "<br/>"; // the value of $file1 is "index.php"

print $file2 . "<br/>"; // the value of $file2 is "index"
