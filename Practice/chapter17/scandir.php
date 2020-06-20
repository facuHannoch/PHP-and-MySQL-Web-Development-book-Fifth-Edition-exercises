<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse directories</title>
</head>

<body>
    <h1>Browsing</h1>


    <?php

    /**
      if you require a sorted list, you can use a function called scandir(). This function can be used to store the filenames in an array and sort them in alphabetical order, either ascending or descending
     */

    // $dir = "path/to/uploads/";
    $dir = "./uploads/";

    $files1 = scandir($dir);
    $files2 = scandir($dir, 1);

    echo '<p>Upload directory is ' . $dir . '</p>';
    echo '<p>Directory Listing in alphabetical order, ascending:</p><ul>';

    foreach ($files1 as $file) {
        if ($file != "." && $file != "..") {
            echo '<li>' . $file . '</li>';
        }
    }

    echo '</ul>';

    echo '<p>Upload directory is ' . $dir . '</p>';
    echo '<p>Directory Listing in alphabetical, descending:</p><ul>';

    foreach ($files2 as $file) {
        if ($file != "." && $file != "..") {
            echo '<li>' . $file . '</li>';
        }
    }

    echo '</ul>';

    ?>

</body>

</html>