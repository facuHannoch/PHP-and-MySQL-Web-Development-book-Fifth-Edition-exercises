<?php
/**
 * PHP has a set of functions that enable you to convert between different calendar systems. The main calendars you will work with are the Gregorian, Julian, and Julian Day Count.
 * 
 * Most Western countries currently use the Gregorian calendar. The Gregorian date October 15, 1582, is equivalent to October 5, 1582, in the Julian calendar. Prior to that date, the Julian calendar was commonly used. Different countries converted to the Gregorian calendar at different times and some not until early in the twentieth century.
 * 
 * Although you may have heard of these two calendars, you might not have heard of the Julian Day Count (JD). It is similar in many ways to a Unix timestamp. It is a count of the number of days since a date around 4000 BC. In itself, it is not particularly useful, but it is useful for converting between formats. To convert from one format to another, you first convert to a Julian Day Count and then to the desired output calendar.
 * 
 * To use these functions under Unix, you first need to compile the calendar extension into PHP with --enable-calendar. These functions are built into the standard Windows install.
 * 
 * 
 * To give you a taste for these functions, consider the prototypes for the functions you would use to convert from the Gregorian calendar to the Julian calendar:
 * 
  int gregoriantojd (int month, int day, int year)

  string jdtojulian(int julianday)
 * 
 */

$jd = gregoriantojd(9, 18, 1582);
echo jdtojulian($jd); // This call echoes the Julian date in a MM/DD/YYYY format.

// Variations of these functions exist for converting between the Gregorian, Julian, French, and Jewish calendars and Unix timestamps.

?>