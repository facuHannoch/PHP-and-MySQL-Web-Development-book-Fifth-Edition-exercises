<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brose Directories</title>
</head>

<body>
    <h1>Browsing</h1>

    <?php

    /**
      As an alternative to the functions used in browsedir.php, you can use the dir class provided by PHP. It has the properties handle and path, and the methods read(), close(), and rewind(), which perform identically to the nonclass alternatives.
     */

    // $dir = dir("/path/to/uploads/");
    $dir = dir("./uploads/");


    echo '<p>Handle is ' . $dir->handle . '</p>';
    echo '<p>Upload directory is ' . $dir->path . '</p>';
    echo '<p>Directory Listing:</p><ul>';


    while (false !== ($file = $dir->read()))
        // strips out the two entries of . and  ..
        if ($file != "." && $file != "..") {
            echo '<li>' . $file . '</li>';
        }
    echo '</ul>';
    $dir->close();

    ?>

</body>

</html>