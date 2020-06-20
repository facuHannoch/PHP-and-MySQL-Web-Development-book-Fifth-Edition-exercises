<?php

$path = "./uploads/";

dirname($path); // return the directory part of the path
basename($path); // returns the filename part of the path

disk_free_space($path); // listing an indication of how much space is left for uploads.  If you pass this function a path to a directory, it will return the number of bytes free on the disk (Windows) or the file system (Unix) on which the directory is located.



// You can create or delete directories only in paths that the user the script runs as has access to.
mkdir($path); // Using mkdir() is more complicated than you might think. It takes two parameters: the path to the desired directory (including the new directory name) and the permissions you would like that directory to have.
// However, the permissions you list are not necessarily the permissions you are going to get. The inverse of the current umask will be combined with this value using AND to get the actual permissions. For example, if the umask is 022, you will get permissions of 0755.

// You might like to reset the umask before creating a directory to counter this effect, by entering
$oldumask = umask(0); // This code uses the umask() function, which can be used to check and change the current umask. It changes the current umask to whatever it is passed and returns the old umask, or, if called without parameters, it just returns the current umask.
mkdir("/tmp/testing", 0777);
umask($oldumask);
/**
  the umask() function has no effect on Windows systems.
 */

rmdir($path); // The rmdir() function deletes a directory
// The directory you are trying to delete must be empty.