<?php

/**
 * MySQL provides an extensive range of date manipulation functions that work for times outside the reliable range of Unix timestamps. You need to connect to a MySQL server to run your query, but you do not have to select any data from the database.
 */

// For example, the following query adds one day to the date February 28, 1700, and returns the resulting date:
$query = "select adddate('1700-02-28', interval 1 day)";


//  The following code uses MySQL to get a person's age given his birhtday

// set date for calculation
$day = 18;
$month = 9;
$year = 1972;

// format birthday as an ISO 8601 date 
$bdayISO = date("c", mktime (0, 0, 0, $month, $day, $year));

// use mysql quey to calculate an age in days
$db = mysqli_connect('localhost', 'bookorama', 'bookorama123');

// After formatting the birthday as an ISO timestamp, you pass the following query to MySQL:
$res = mysqli_query($db, "select datediff(now(), '$bdayISO')"); // The MySQL function now() always returns the current date and time. The MySQL function datediff() subtracts one date from another and returns the difference in days.

$age = mysqli_fetch_array($res);

// convert age in days to age in years (approximately)
echo 'Current age is ' . floor($age[0] / 365.25) . '.';

/**
 * It is worth noting that you are not selecting data from a table or even choosing a database to use for this script, but you do need to log in to the MySQL server with a valid username and password.
 * 
 * Because no specific built-in function is available for such calculations, a SQL query to calculate the exact number of years is fairly complex. Here, we took a shortcut and divided the age in days by 365.25 to give the age in years. This calculation can be one year out if run exactly on somebody’s birthday, depending on how many leap years there have been in that person’s lifetime.
 */
