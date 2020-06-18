# Procedure to find the orderid with the largest amount

# could be done with max, but just to illustrate stored procedure principles 



DELIMITER //

CREATE PROCEDURE Largest_Order (OUT Largest_ID INT)

BEGIN 
-- declaring a number of local variables for use within the procedure.
DECLARE This_ID INT;

DECLARE This_Amount FLOAT;

DECLARE L_Amount FLOAT DEFAULT 0.0;

DECLARE L_ID INT;



DECLARE Done INT DEFAULT 0; -- this variable declared is Done, initialized to zero (false). This variable is your loop flag. When you run out of rows to look at, you set this variable to 1 (true).

DECLARE C1 CURSOR FOR SELECT OrderID, Amount FROM Orders; -- this is a cursor. A cursor is like an array; it retrieves a resultset for a query (such as returned by mysqli_query()) and allows you to process it a single line at a time (as you would with, for example, mysqli_fetch_row()).
-- This cursor is called C1. This is just a definition of what it will hold. The query will not be executed yet.

DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET Done = 1; -- this is a declared handler. There are continue handlers and exit handlers. Continue handlers, like the one shown, take the action specified and then continue execution of the procedure. Exit handlers exit from the nearest BEGIN...END block.
-- The next part of the declare handler specifies when the handler will be called. In this case, it will be called when SQLSTATE '02000' is reached. This means it will be called when no rows are found. You process a resultset row by row, and when you run out of rows to process, this handler will be called. You could also specify FOR NOT FOUND equivalently. Other options are SQLWARNING and SQLEXCEPTION.



OPEN C1; -- runs the query. To obtain each row of data, you must run a FETCH statement.

REPEAT

    FECTH C1 INTO This_ID, This_Amount; -- fetches a row of data. This line retrieves a row from the cursor query. The two attributes retrieved by the query are stored in the two specified local variables.

    IF NOT Done then 

        IF This_Amount > L_Amount THEN 

            SET L_Amount = This_Amount; -- Note that variable values are set by means of the SET statement.

            SET L_ID = This_ID;

        END IF;

    END IF;

UNTIL Done END REPEAT; -- Note that the condition (UNTIL DONE) is not checked until the end.

CLOSE C1; -- after the loop has terminated, you have a little cleaning up to do. The CLOSE statement closes the cursor.




SET LARGEST_ID = L_ID; -- Finally, you set the OUT parameter to the value you have calculated. You cannot use the parameter as a temporary variable, only to store the final value.



END

//



DELIMITER ;


-- you can call it as 

# CALL Largest_Order(@l);
# SELECT @l;