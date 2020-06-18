# Basic syntax to create a function


DELIMITER // 



CREATE FUNCTION Add_Tax (Price FLOAT) RETURNS FLOAT NO SQL


BEGIN 

DECLARE Tax FLOAT DEFAULT 0.10; -- you declare the variable using DECLARE, followed by the name of the variable, followed by the type. The default clause is optional and specifies an initial value for the variable. You then use the variable as you would expect.

RETURN Price*(1+Tax);

END

//



DELIMITER ;