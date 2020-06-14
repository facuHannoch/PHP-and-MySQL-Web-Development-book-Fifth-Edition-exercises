<?php
echo 'This is the main file.<br/>';
require('reusable.php'); // the require () statement is replaced by the contents of the requested file, and the script is then executed
hello();
create_table(["1", "2", 3, 4, 5], "ssss", "ssss");
create_table1(["1", "2", 3, 4, 5]);
echo 'The script will end now.<br/>';
