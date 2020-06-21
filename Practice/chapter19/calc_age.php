<?php

/**
 * A simple way to work out the length of time between two dates in PHP is to use the difference between Unix timestamps.
 * 
 * Note, that this approach is somewhat flawed because it is limited by the range of Unix timestamps (generally 32-bit integers). Birthdates are not an ideal application for timestamps. This example works on all platforms only for people born from 1970 onward. Windows cannot manage timestamps prior to 1970. Even then, this calculation is not always accurate because it does not allow for leap years and might fail if midnight on the person’s birthday is the daylight savings switchover time in the local time zone.
 */

// set date for calculations 
$day = 18;
$month = 9;
$year = 1972;

// remember you need bday as day month and year 
$bdayunix = mktime (0, 0, 0, $month, $day, $year); // get ts for then
$nowunix = time(); // get unix ts for today
$ageunix = $nowunix - $bdayunix; // work out the difference 
$age = floor($ageunix / (365 * 24 * 60 * 60)); // convert from seconds to years
// Now, the slightly tricky part: converting this time period back to a more human-friendly unit of measure. This is not a timestamp but instead the age of the person measured in seconds. You can convert it back to years by dividing by the number of seconds in a year. You then round it down by using the floor() function
echo $bdayunix . '<br/>';
echo $nowunix . '<br/>';
echo $ageunix . '<br/>';
echo $age . '<br/>';

echo 'Current age is ' . $age . '.';
