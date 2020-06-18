/*
 Triggers are a type of event-driven stored routine or callback, if you prefer. They are code associated with a particular table that is invoked when a particular action is taken on that table.
*/

# Trigger example



DELIMITER //



# delete order_items before order to avoid referential integrity error 

CREATE TRIGGER Delete_Order_Items  --  names the trigger to be created. This trigger is invoked when we try to delete an order.

-- {BEFORE | AFTER} {INSERT | UPDATE | DELETE} ON table
BEFORE DELETE ON Orders FOR EACH ROW -- This is triggered before delete on orders. 

BEGIN 

    DELETE FROM Order_Items WHERE OLD.OrderID = OrderID; -- The OLD keyword means “use the value of this column before the invoking query runs.” There is also a NEW keyword.

END

//



DELIMITER ;