/* 
 A stored procedure is a programmatic function that is created and stored within MySQL. It can consist of SQL statements and a number of special control structures. It can be useful when you want to perform the same function from different applications or platforms, or as a way of encapsulating functionality. Stored procedures in a database can be seen as analogous to an object-oriented approach in programming. They allow you to control the way data is accessed.
*/

# Basic stored procedured example



DELIMITER //  -- changes the end-of-statement delimiter from the current value—typically a semicolon unless you have changed it previously—to a double forward slash.



CREATE PROCEDURE Total_Orders (OUT Total FLOAT) -- creates the actual procedure. The name of this procedure is Total_Orders. It has a single parameter called Total, which is the value you are going to calculate. The word OUT indicates that this parameter is being passed out or returned. The word FLOAT indicates the type of the parameter.
-- Parameters can also be declared IN, meaning that a value is being passed into the procedure, or INOUT, meaning that a value is being passed in but can be changed by the procedure.

BEGIN -- The body of the procedure is enclosed within the BEGIN and END statements.

SELECT SUM(Amount) INTO Total FROM Orders; -- a SELECT statement. The only difference from normal is that you include the clause INTO Total to load the result of the query into the Total parameter.

END

// 



DELIMITER ; -- After you have declared the procedure, you return the delimiter back to being a semicolon


-- After the procedure has been declared, you can call it using the CALL keyword, as follows:

# CALL Total_Orders(@t);