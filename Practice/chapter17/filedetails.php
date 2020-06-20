<!DOCTYPE html>

<html>

<head>
    <title>File Details</title>
</head>

<body>
    <?php
    /**
      Some of the functions used here are not supported under Windows, including posix_getpwuid(), fileowner(), and filegroup(), or are not supported reliably.
     */

    if (!isset($_GET['file'])) {
        echo "You have not specified a file name.";
    } else {
        $uploads_dir = '/path/to/uploads/';

        // strip off directory information for security
        $the_file = basename($_GET['file']); // the basename() function gets the name of the file without the directory. (You can also use the dirname() function to get the directory name without the filename.)

        $safe_file = $uploads_dir . $the_file;



        echo '<h1>Details of File: ' . $the_file . '</h1>';
        echo '<h2>File Data</h2>';

        //  We reformatted the timestamp here using the date() function make it more human readable.
        echo 'File Last Accessed: ' . date('j F Y H:i', fileatime($safe_file)) . '<br/>'; // the function fileatime () returns the timestamp of the time the file was last accessed
        echo 'File Last Modified: ' . date('j F Y H:i', filemtime($safe_file)) . '<br/>'; // the function filemtime () returns the timestamp of the time the file was last modified
        // These functions return the same value on some operating systems (as in the example) depending on what information the system stores.


        // The fileowner() and filegroup() functions return the user ID (uid) and group ID (gid) of the file. These IDs can be converted to names using the functions posix_getpwuid() and posix_getgrgid(), respectively, which makes them a bit easier to read. These functions take the uid or gid as a parameter and return an associative array of information about the user or group, including the name of the user or group, as we have used in this script.

        $user = posix_getpwuid(fileowner($safe_file));
        echo 'File Owner: ' . $user['name'] . '<br/>';

        $group = posix_getgrgid(filegroup($safe_file));
        echo 'File Group: ' . $group['name'] . '<br/>';


        echo 'File Permissions: ' . decoct(fileperms($safe_file)) . '<br/>'; // The fileperms() function returns the permissions on the file. We reformatted them as an octal number using the decoct() function to put them into a format more familiar to Unix users.
        echo 'File Type: ' . filetype($safe_file) . '<br/>'; // The filetype() function returns some information about the type of file being examined. The possible results are fifo, char, dir, block, link, file, and unknown.
        echo 'File Size: ' . filesize($safe_file) . ' bytes<br>'; // The filesize() function returns the size of the file in bytes.


        echo '<h2>File Tests</h2>';

        // The second set of functions—is_dir(), is_executable(), is_file(), is_link(), is_readable(), and is_writable()—all test the named attribute of a file and return true or false.
        echo 'is_dir: ' . (is_dir($safe_file) ? 'true' : 'false') . '<br/>';
        echo 'is_executable: ' . (is_executable($safe_file) ? 'true' : 'false') . '<br/>';
        echo 'is_file: ' . (is_file($safe_file) ? 'true' : 'false') . '<br/>';
        echo 'is_link: ' . (is_link($safe_file) ? 'true' : 'false') . '<br/>';
        echo 'is_readable: ' . (is_readable($safe_file) ? 'true' : 'false') . '<br/>';
        echo 'is_writable: ' . (is_writable($safe_file) ? 'true' : 'false') . '<br/>';

        // Alternatively, you could use the function stat() to gather a lot of the same information. When passed a file, this function returns an array containing similar data to these functions. The lstat() function is similar, but for use with symbolic links.


        /**
         * All the file status functions are quite expensive to run in terms of time. Their results are therefore cached. If you want to check some file information before and after a change, you need to call
          clearstatcache();
         * to clear the previous results. If you want to use the previous script before and after changing some of the file data, you should begin by calling this function to make sure the data produced is up to date.
         */
    }

    ?>

    <?php
    /**
     * In addition to viewing file properties, you can alter them as well, if the web server user has the proper filesystem permissions.
     * 
     * Each of the chgrp(file, group), chmod(file, permissions), and chown(file, user) functions behaves similarly to its Unix equivalent. None of these functions will work in Windows-based systems, although chown() will execute and always return true.
     * 
     * 
     * The chgrp() function changes the group of a file. It can be used to change the group only to groups of which the user is a member unless the user is root.
     * 
     * The chmod() function changes the permissions on a file. The permissions you pass to it are in the usual Unix chmod form. You should prefix them with a 0 (a zero) to show that they are in octal, as in this example:
     * chmod('somefile.txt', 0777);
     * 
     * The chown() function changes the owner of a file. It can be used only if the script is running as root, which should never happen, unless you are specifically running the script from the command line to perform an administrative task.
     * 
     */
    ?>

    <?php
    /**
     * You can use the file system functions to create, move, and delete files, if the web server user has the proper filesystem permissions.
     * 
     * 
     * First, and most simply, you can create a file, or change the time it was last modified, using the touch() function. This function works similarly to the Unix command touch. The function has the following prototype:
      bool touch (string file, [int time [, int atime]])
     * If the file already exists, its modification time will be changed either to the current time or the time given in the second parameter if it is specified. If you want to specify this time, you should give it in timestamp format. If the file doesn’t exist, it will be created. The access time of the file will also change, by default to the current system time or alternatively to the timestamp you specify in the optional atime parameter.
     * 
     * You can delete files using the unlink() function. (Note that this function is not called delete()—there is no delete().) You use it like this:
      unlink($filename);
     * 
     * You can copy and move files with the copy() and rename() functions, as follows:
     copy($source_path, $destination_path);
     rename($oldfile, $newfile);
     * The rename() function serves double duty as a function to move files from place to place because PHP doesn’t have a move function beyond the specific move_uploaded_file() function. Whether you can move files from file system to file system and whether files are overwritten when rename() is used are operating system dependent, so check the effects on your server. Also, be careful about the path you use to the filename. If relative, this will be relative to the location of the script, not the original file.
     */
    ?>

</body>

</html>