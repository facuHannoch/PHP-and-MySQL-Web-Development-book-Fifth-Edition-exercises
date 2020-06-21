<?php
$date = date('jS F Y'); //  the date() function takes two parameters, one of them optional. The first one is a format string, and the second, optional one is a Unix timestamp. If you don’t specify a timestamp, date() will default to the current date and time. It returns a formatted string representing the appropriate date.
// The second parameter to the date() function is a Unix timestamp. Most Unix systems store the current time and date as a 32-bit integer containing the number of seconds since midnight, January 1, 1970, GMT, also known as the Unix Epoch. 
// On some systems including Windows, the range is more limited. A timestamp cannot be negative, so timestamps before 1970 cannot be used. To keep your code portable, you should bear this fact in mind.
$theSuperDate = date("\\T\h\\e \d\a\y \i\s j"); // if we want to put characters literals, we can escape them with \


echo $date;
echo '<br/>';
echo $theSuperDate;
echo '<br/>';


$year = date("Y");
$mon = date("n");
$day = getdate();

echo 'Date: ';
echo '<br/>';
echo $year.' '.$mon.' '.$day["mday"];
echo '<br/>';
echo '<br/>';




// If you want to convert a date and time to a Unix timestamp, you can use the mktime() function.
//  int mktime ([int hour [, int[, int minute[, int second[, int month[, int day[, int year]]]]]])
//  If you are not worried about the time, you can pass in 0s to the hour, minute, and second parameters. You can, however, leave out values from the right side of the parameter list. If you don’t provide parameters, they will be set to the current values.

$timestamp = mktime(); // returns the Unix timestamp for the current date and time (although it will throw an E_STRICT notice if that is your error reporting setting).
// You could also get the same result by calling
$timestamp = time(); // The time() function does not take any parameters and always returns the Unix timestamp for the current date and time.

$timestamp = date("U"); // Another option is the date() function, as already discussed. The format string "U" requests a timestamp.
// You can pass in a two- or four-digit year to mktime(). Two-digit values from 0 to 69 are interpreted as the years 2000 to 2069, and values from 70 to 99 are interpreted as 1970 to 1999.
$time = mktime(12, 0, 0);

$time = mktime(0,0,0,1,1); // gives the 1st of January in the current year. Note that 0 (rather than 24) is used in the hour parameter to specify midnight.

$time = mktime(12,0,0,$mon,$day["mday"]+30,$year); // adds 30 days to the date specified in the components, even though ($day+30) will usually be bigger than the number of days in that month.
// To eliminate some problems with daylight savings time, use hour 12 rather than hour 0. If you add (24 * 60 * 60) to midnight on a 25-hour day, you’ll stay on the same day. Add the same number to midday, and it’ll give 11am but will at least be the right day.


// array getdate ([int timestamp])
// It takes an optional timestamp as a parameter and returns an array representing the parts of that date and time

$today = getdate();
print_r($today); // if you call getdate() without a parameter, it will give you the current timestamp.
echo '<br/>';
echo '<br/>';




// You can use the checkdate() function to check whether a date is valid.
// int checkdate (int month, int day, int year)
// It checks whether the year is a valid integer between 0 and 32,767, whether the month is an integer between 1 and 12, and whether the day given exists in that particular month. The function also takes leap years into consideration when working out whether a day is valid.

checkdate(2, 29, 2008); // returns true 

checkdate(2, 29, 2007); // returns false




// You can format a timestamp according to the system’s locale (the web server’s local settings) using the strftime() function.
// string ( string $format [, int $timestamp] )
// The $format parameter is the formatting code that defines how the timestamp will be displayed. The $timestamp parameter is the timestamp that you pass to the function. This parameter is optional. If no timestamp is passed as a parameter, the local system timestamp (at the time the script is run) is used.

// the following lines display the current system timestamp in four different formats. 
echo strftime('%A<br />');
echo strftime('%x<br />');
echo strftime('%C<br />');
echo strftime('%Y<br />');

echo '<br/>';
echo '<br/>';

// It is important to note that whenever it says standard format, the formatting code gets replaced by the associated value according to the web server’s locale settings. The strftime() function is very useful for displaying dates and times in a variety of different ways to make your pages more user friendly.


