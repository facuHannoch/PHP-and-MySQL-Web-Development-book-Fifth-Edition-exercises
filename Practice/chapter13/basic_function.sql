/*
 In a way similar to creating a procedure, you can create a function. A function accepts input parameters (only) and returns a single value.
*/

# Basic syntax to create a function


DELIMITER //


CREATE FUNCTION Add_Tax(Price FLOAT) RETURNS FLOAT NO SQL -- Parameters do not need to be specified as IN or OUT because they are all IN, or input parameters. After the parameter list, you can see the clause RETURNS FLOAT. It specifies the type of the return value. This value can be any of the valid MySQL types. After this you will see the keywords NO SQL. This is the characteristic of the function.

RETURN Price*1.1; -- You return a value using the RETURN statement
-- Notice that this example does not use the BEGIN and END statements. You could use them, but they are not required. If a statement block contains only one statement, you do not need to mark the beginning and end of it.


// 


DELIMITER ;



/*
 Other things you might see in the location of the characteristic of the function are:

 DETERMINISTIC or NOT DETERMINISTIC — a deterministic function will, given the same parameters, always return the same value.

 NO SQL, CONTAINS SQL, READS SQL DATA, or MODIFIES SQL DATA indicates the contents of the function. In this case we have no SQL statements, so the function is NO SQL.

 A comment in single quotes ’ and ’.

 A language declaration: LANGUAGE SQL.

 SQL SECURITY DEFINER or SQL SECURITY INVOKER defines whether to use the privilege level of the definer (declared in the function) or the invoker of the function.
*/

/*
 when you are defining functions, if you have binary logging switched on, you will need to have one of DETERMINISTIC, NO SQL, or READS SQL DATA declared here. This is because functions that write data may be unsafe for recovery and replication, and therefore are not allowed.
*/


-- You can call a stored function in the same way you would call a built-in function.

# SELECT Add_Tax(100);