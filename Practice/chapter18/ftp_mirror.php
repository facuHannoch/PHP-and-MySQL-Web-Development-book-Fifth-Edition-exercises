<!DOCTYPE html>
<html>

<head>
    <title>Mirror Update</title>
</head>

<body>
    <h1>Mirror Update</h1>

    <?php

    /**
     * File Transfer Protocol, or FTP, is used to transfer files between hosts on a network. Using PHP, you can use fopen() and the various file functions with FTP as you can with HTTP connections, to connect to and transfer files to and from an FTP server. However, a set of FTP-specific functions also comes with the standard PHP install.
     * These functions are not built into the standard install by default. To use them under Unix, you need to run the PHP configure program with the --enable-ftp option and then rerun make. If you are using the standard Windows install, FTP functions are enabled automatically.
     * 
     * The FTP functions are useful for moving and copying files from and to other hosts. One common use you might make of this capability is to back up your website or mirror files at another location.
     * 
     * 
     * The basic steps you follow in this script are the same as if you wanted to manually transfer the file via FTP from a command-line interface:
     * 
     * 1. Connect to the remote FTP server.
     * 
     * 2. Log in (either as a user or anonymous).
     * 
     * 3. Check whether the remote file has been updated.
     * 
     * 4. If it has, download it.
     * 
     * 5. Close the FTP connection.
     * 
     */


    // set up variables - change these to suit application

    // The $host variable should contain the name of the FTP server you want to connect to, and the $user and $password correspond to the username and password you would like to log in with.
    $host = 'apache.cs.utah.edu';
    $user = 'anonymous';
    $password = 'me@example.com';
    // Many FTP sites support what is called anonymous login—that is, a freely available username that anybody can use to connect. No password is required, but it is a common courtesy to supply your email address as a password so that the system’s administrators can see where their users are coming from. We followed this convention here.

    $remotefile = '/apache.org/httpd/httpd-2.4.16.tar.gz';  // The $remotefile variable contains the path to the file you would like to download. In this case, you are downloading and mirroring a local copy of the Apache web server for Unix.

    // $localfile = '/path/to/files/httpd-2.4.16.tar.gz';
    $localfile = './files/httpd-2.4.16.tar.gz'; // The $localfile variable contains the path to the location where you are going to store the downloaded file on your machine. No matter what directory you place your downloaded file into, be sure the permissions are set up so that PHP can write a file into it. Regardless of your operating system, you will need to create this directory for the script to work, if the directory does not already exist. Additionally, if your operating system has strong permissions, you will need to make sure that they allow your script to write. You should be able to change these variables to adapt this script for your purposes.






    // connect to host
    $conn = ftp_connect($host); // This function takes a hostname as a parameter and returns either a handle to a connection or false if a connection could not be established. The function can also take the port number on the host to connect to as an optional second parameter. We did not use this parameter here; if you don’t specify a port number, it will default to port 21, which is the default for FTP.
    /** this function is equivalent to typing:
         ftp hostname
     * at a command prompt on either a Windows or Unix platform. */
    

    if (!$conn) {
        echo 'Error: Could not connect to ' . $host;
        exit;
    }

    echo 'Connected to ' . $host . '<br />';

    // log in to host
    $result = @ftp_login($conn, $user, $pass); // The function takes three parameters: an FTP connection (obtained from ftp_connect()), a username, and a password. It returns true if the user can be logged in and false if she can’t.
    // Notice that we put an @ symbol at the start of the line to suppress errors. We did this because, if the user cannot be logged in, a PHP warning appears in the browser window. You can catch the error as we have done here by testing $result and supplying your own, more user-friendly error message.
    if (!$result) {
        echo 'Error: Could not log in as ' . $user;
        ftp_quit($conn); // Notice that if the login attempt fails, you actually close the FTP connection by using ftp_quit().
        exit;
    }


    echo 'Logged in as ' . $user . '<br />';

    // Turn on passive mode
    ftp_pasv($conn, true); // In this case, we are ensuring that passive mode is true, which means that all data connections will be initiated by the client (the script) rather than by the remote FTP server. If you do not turn on passive mode, you may find that your script will not succeed past the point of login.

    // Check file times to see if an update is required
    echo 'Checking file time...<br />';
    if (file_exists($localfile)) { // To begin deciding whether you need to download a file, you check that you have a local copy of the file by using the file_exists()
        $localtime = filemtime($localfile); //  If it does exist, you get the last modified time of the file by using the filemtime() function and store it in the $localtime variable.
        echo 'Local file last updated ';
        echo date('G:i j-M-Y', $localtime);
        echo '<br />';
    } else { //  If it doesn’t exist, you set the $localtime variable to 0 so that it will be “older” than any possible remote file modification time:
        $localtime = 0;
    }

    // File times are the reason that you use the FTP functions rather than a much simpler call to a file function. The file functions can easily read and, in some cases, write files over network interfaces, but most of the status functions such as filemtime() do not work remotely.

    
    $remotetime = ftp_mdtm($conn, $remotefile); // After you have sorted out the local time, you need to get the modification time of the remote file. You can get this time by using the ftp_mdtm() function
    // This function takes two parameters—the FTP connection handle and the path to the remote file—and returns either the Unix timestamp of the time the file was last modified or –1 if there is an error of some kind. Not all FTP servers support this feature, so you might not get a useful result from the function. In this case, you can choose to artificially set the $remotetime variable to be “newer” than the $localtime variable by adding 1 to it. This way, you ensure that an attempt is made to download the file
    if (!($remotetime >= 0)) {
        // This doesn't mean the file's not there, server may not support mod time
        echo 'Can\'t access remote file time.<br />';
        $remotetime = $localtime + 1;  // make sure of an update
    } else {
        echo 'Remote file last updated ';
        echo date('G:i j-M-Y', $remotetime);
        echo '<br />';
    }


    if (!($remotetime > $localtime)) { // When you have both times, you can compare them to see whether you need to download the file
        echo 'Local copy is up to date.<br />';
        exit;
    }

    // download file from the server
    echo 'Getting file from server...<br />';
    $fp = fopen($localfile, 'wb'); // You open a local file by using fopen()

    if (!$success = ftp_fget($conn, $fp, $remotefile, FTP_BINARY)) { // After you have done this, you call the function ftp_fget(), which attempts to download the file and store it in a local file. This function takes four parameters. The first three are the FTP connection, the local file handle, and the path to the remote file. The fourth parameter is the FTP mode.
        // The two modes for an FTP transfer are ASCII and binary. The ASCII mode is used for transferring text files (that is, files that consist solely of ASCII characters), and the binary mode is used for transferring everything else. Binary mode transfers a file unmodified, whereas ASCII mode translates carriage returns and line feeds into the appropriate characters for your system (\n for Unix, \r\n for Windows, and \r for Macintosh).
        // PHP’s FTP library comes with two predefined constants, FTP_ASCII and FTP_BINARY. You pass the corresponding constant to ftp_fget() as the fourth parameter. In this case, you are transferring a gzipped file, so you use the FTP_BINARY mode.
        // The ftp_fget() function returns true if all goes well or false if an error is encountered. You store the result in $success and let the user know how it went.

        echo 'Error: Could not download file.';

        ftp_quit($conn); // After you have finished with the FTP connection, you should close it using the ftp_quit() function. You should pass this function the handle for the FTP connection.
        
        exit;
    }

    fclose($fp); // After the download has been attempted, you close the local file by using the fclose() function.
    echo 'File downloaded successfully.';


    // close connection to host
    ftp_close($conn);

    /**
     * As an alternative to ftp_fget(), you could use ftp_get(), which has the following prototype
      int ftp_get (int ftp_connection, string localfile_path, string remotefile_path, int mode)
     * 
     * This function works in much the same way as ftp_fget() but does not require the local file to be open. You pass it the system filename of the local file you would like to write to rather than a file handle.
     * 
     * Note that there is no equivalent to the FTP command mget, which can be used to download multiple files at a time. You must instead make multiple calls to ftp_fget() or ftp_get().
     */
    ?>

    <?php

    /**
     * If you want to go the other way—that is, copy files from your server to a remote machine—you can use two functions that are basically the opposite of ftp_fget() and ftp_get(). These functions are called ftp_fput() and ftp_put(). They have the following prototypes:
     * 
      int ftp_fput (int ftp_connection, string remotefile_path, int fp, int mode)
     * 
      int ftp_put (int ftp_connection, string remotefile_path, string localfile_path, int mode)
     * 
     * The parameters are the same as for the _get equivalents.
     * 
     * 
     */
    ?>

    <?php
    /**
     * One problem you might face when transferring files via FTP is exceeding the maximum execution time. You will know when this happens because PHP gives you an error message. This error is especially likely to occur if your server is running over a slow or congested network, or if you are downloading a large file, such as a movie clip.
     * 
     * The default value of the maximum execution time for all PHP scripts is defined in the php.ini file. By default, it’s set to 30 seconds. This is designed to catch scripts that are running out of control. However, when you are transferring files via FTP, if your link to the rest of the world is slow or if the file is large, the file transfer could well take longer than this.
     * 
     * You can modify the maximum execution time for a particular script by using the set_time_limit() function. Calling this function resets the maximum number of seconds the script is allowed to run, starting from the time the function is called. For example, if you call
     * 
      set_time_limit(90);
     * 
     * the script will be able to run for another 90 seconds from the time the function is called.
     */
    ?>

    <?php
    /**
     * The function ftp_size() can tell you the size of a file on a remote server. It has the following prototype:
     * 
      int ftp_size (int ftp_connection, string remotefile_path)
     * 
     * This function returns the size of the remote file in bytes or -1 if an error occurs. It is not supported by all FTP servers.
     * 
     * One handy use of ftp_size() is to work out the maximum execution time to set for a particular transfer. Given the file size and speed of your connection, you can take a guess as to how long the transfer ought to take and use the set_time_limit() function accordingly.
     * 
     * 
     * 
     * You can get and display a list of files in a directory on a remote FTP server by using the following code:
     * 
      $listing = ftp_nlist ($conn, dirname($remotefile));
      
      foreach ($listing as $filename)
      {
        echo $filename.'<br/>';
      }
     * 
     * This code uses the ftp_nlist() function to get a list of names of files in a particular directory.
     * 
     * In terms of other FTP functions, almost anything that you can do from an FTP command line, you can do with the FTP functions, with the exception of mget (multiple get). For mget, you could use ftp_nlist() to get a list of files and then fetch them as needed.
     * 
     */
    ?>
</body>

</html>