<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploading...</title>
</head>

<body>
    <h1>Uploading File...</h1>

    <?php

    // You begin by checking the error code returned in $_FILES['userfile']['error'] A constant is also associated with each of the codes.
    if ($_FILES['the_file']['error'] > 0) { // UPLOAD_ERROR_OK, value 0, means no error occurred.
        echo 'Problem: ';
        switch ($_FILES['the_file']['error']) {
            case 1: // UPLOAD_ERR_INI_SIZE, value 1, means that the size of the uploaded file exceeds the maximum value specified in your php.ini file with the upload_max_filesize directive.
                echo 'File exceed upload_max_filesize.';
                break;
            case 2: // UPLOAD_ERR_FORM_SIZE, value 2, means that the size of the uploaded file exceeds the maximum value specified in the HTML form in the MAX_FILE_SIZE element.
                echo 'File exceeed max_file_size.';
                break;
            case 3: // UPLOAD_ERR_PARTIAL, value 3, means that the file was only partially uploaded.
                echo 'File only partially uploaded.';
                break;
            case 4: // UPLOAD_ERR_NO_FILE, value 4, means that no file was uploaded.
                echo 'No file uploaded.';
                break;
            case 6: // UPLOAD_ERR_NO_TMP_DIR, value 6, means that no temporary directory is specified in the php.ini.
                echo 'Cannot upload file: No temp directory specified.';
                break;
            case 7: // UPLOAD_ERR_CANT_WRITE, value 7, means that writing the file to disk failed.
                echo 'Upload failed: Cannot write to disk.';
                break;
            case 8: // UPLOAD_ERR_EXTENSION, value 8, means that a PHP extension stopped the file upload process.
                echo 'A PHP extension blocked the file upload.';
                break;
        }
        exit;
    }

    // Does the file have the right MIME type? 
    if ($_FILES['the_file']['type'] != 'image/png') {
        echo 'Problem: file is not a png image.';
        exit;
    }

    // put the file where we'd like it
    // $uploaded_file = '/filesystem/path/to/uploads/' . $_FILES['the_file']['name'];
    // $uploaded_file = './uploads/' . $_FILES['the_file']['name'];
    $uploaded_file = './uploads/' . basename($_FILES['the_file']['name']);

    //  To mitigate the risk of users “directory surfing” on your server, you can use the basename() function to modify the names of incoming files. This function will strip off any directory paths that are passed in as part of the filename, which is a common attack that is used to place a file in a different directory on your server.

    $file1 = basename($uploaded_file);
    $file2 = basename($file1, ".php");

    if (is_uploaded_file($_FILES['the_file']['tmp_name'])) { // You then check that the file you are trying to open has actually been uploaded and is not a local file such as /etc/passwd.
        if (!move_uploaded_file($_FILES['the_file']['tmp_name'], $uploaded_file)) { // If these checks work out, the code then copies the file into the /uploads/ directory, for easy access to display these uploaded files
            echo 'Proble: Could not move file to destination directory.';
            exit;
        }
    } else {
        echo 'Problem: Possible file upload attack. Filename: ';
        echo $_FILES['the_file']['name'];
        exit;
    }

    echo 'File uploaded succesfully.';

    // show what was uploaded 
    echo '<p>You uploaded the following image:<br/>';
    echo '<img src="/uploads/' . $_FILES['the_file']['name'] . '"/>'; // we display these uploaded files at the end of the script by printing an HTML <img/> tag containing the path to the uploaded file so that the user can see that the file uploaded successfully.
    ?>
</body>

</html>