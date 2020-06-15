<?php

class myException extends Exception // You declare a new exception class, called myException, that extends the basic Exception class.
{
    function __toString()
    {
        return "<strong>Exception " . $this->getCode() .
            "</strong>: " . $this->getMessage() . "<br/>" .
            "in " . $this->getFile() . " on line " . $this->getLine() . " <br/>";
    }
}

try {
    throw new myException("A terrible error has occurred", 42);
} catch (myException $m) {
    echo $m;
}
