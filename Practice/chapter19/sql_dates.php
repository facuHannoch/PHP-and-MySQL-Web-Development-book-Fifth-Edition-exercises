<?php
/**
 * Dates and times in MySQL are handled in ISO 8601 format. Times work relatively intuitively, but ISO 8601 requires you to enter dates with the year first. For example, you could enter February 17, 2015, either as 2015-02-17 or as 15-02-17. Dates retrieved from MySQL are also in this format by default.
 * 
 * To communicate between PHP and MySQL, then, you usually need to perform some date conversion. This operation can be performed at either end.
 * 
 * When putting dates into MySQL from PHP, you can easily put them into the correct format by using the date() function, as shown previously. One minor caution if you are creating them from your own code is that you should store the day and month with leading zeros to avoid confusing MySQL. You can use a two-digit year, but using a four-digit year is usually a good idea. If you want to convert dates or times in MySQL, two useful functions are DATE_FORMAT() and UNIX_TIMESTAMP().
 * 
  SELECT DATE_FORMAT (date_column, '%m %d %Y')
  FROM tablename;
 * 
 * The format code %m represents the month as a two-digit number; %d, the day as a two-digit number; and %Y, the year as a four-digit number.
 * 
 * 
 * 
 * The UNIX_TIMESTAMP() function works similarly but converts a column into a Unix timestamp. For example,
 * 
  SELECT UNIX_TIMESTAMP (data_column)
  FROM tablecolumn;
 * 
 * returns the date formatted as a Unix timestamp. You can then do as you want with it in PHP.
 * 
 * You can easily perform date calculations and comparisons with the Unix timestamp. Bear in mind, however, that a timestamp can usually represent dates only between 1902 and 2038, whereas the MySQL date type has a much wider range.
 * 
 * 
  Use a Unix timestamp for date calculations and the standard date format when you are just storing or showing dates.
 */
