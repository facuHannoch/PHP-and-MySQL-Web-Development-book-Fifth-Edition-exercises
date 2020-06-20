<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Directories</title>
</head>

<body>
    <h1>Browsing</h1>

    <?php
    // $current_dir = 'path/to/upload';
    $current_dir = './uploads';

    $dir = opendir($current_dir); // The function opendir() opens a directory for reading. Its use is similar to the use of fopen() for reading from files. Instead of passing it a filename, you should pass it a directory name. The function returns a directory handle
    // When the directory is open, you can read a filename from it by calling readdir($dir), as shown in the example. This function returns false when there are no more files to be read. Note that it will also return false if it reads a file called "0"; in order to guard against this, we explicitly test to make sure the return value is not equal to false


    echo '<p>Upload directory is ' . $current_dir . '</p>';

    echo '<p>Directory Listing:</p><ul>';


    // echo '<li><a href="filedetails.php?file='.$file.'">'.$file.'</a></li>';
    while (false !== ($file = readdir($dir))) {
        // strip out the two entries of . and  ..

        if ($file != "." && $file != "..") { // Typically the . (the current directory) and .. (one level up) directories would also display in the list. However, we stripped these directories out with the following line of code:
            echo '<li>' . $file . '</li>';
        }
        // An associated and sometimes useful function is rewinddir($dir), which resets the reading of filenames to the beginning of the directory.
    }
    
    echo '</ul>';
    

    closedir($dir); // When you are finished reading from a directory, you call closedir($dir) to finish. This is again similar to calling fclose() for a file.

    ?>
</body>

</html>