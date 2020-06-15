<?php
try {
    throw new Exception("A terrible error has occurred", 42);
} catch (Exception $e) {
    echo "Exception " . $e->getCode() . // getCode() — Returns the code as passed to the constructor
        " : " . $e->getMessage() . // getMessage() — Returns the message as passed to the constructor
        ". <br/>  in " . $e->getFile() . //  getFile() — Returns the full path to the code file where the exception was raised
        " on line " . $e->getLine() . // getLine() — Returns the line number in the code file where the exception was raised
        " <br/> ".//;
        " <br/> ".//;
        $e;
}
