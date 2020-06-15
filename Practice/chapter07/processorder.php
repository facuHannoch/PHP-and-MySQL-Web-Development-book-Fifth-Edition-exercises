<?php
require_once("file_exceptions.php");

// create short variable names 
$tireqty = (int) $_POST["tireqty"];
$oilqty = (int) $_POST["oilqty"];
$sparkqty = (int) $_POST["sparkqty"];
$address = preg_replace('/ \t \R /', ',', $_POST["address"]);
$document_root = $_SERVER["DOCUMENT_ROOT"];
$date = date('H:i, jS F Y');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bob's Auto Parts- Order Result</title>
</head>

<body>
    <h1>Bob's Auto Parts</h1>
    <h2>Order Results</h2>
    <?php
    echo "<p>Order processed at " . date('H:i jS F Y') . "</p>";
    echo "<p>Your order is as follows: </p>";

    $totalqty = 0;
    $totalamount = 0.00;
    define("TIREPRICE", 100);
    define("OILPRICE", 10);
    define("SPARKPRICE", 4);

    $totalqty = $tireqty + $oilqty + $parkqty;
    echo "<p>Items ordered: " . $totalqty . "<br/>";

    if ($totalqty == 0) {
        echo "You did not order anything in the previous page! <br/>";
    } else {
        if ($tireqty > 0) {
            echo htmlspecialchars($tireqty) . " tires <br/>";
        } else if ($oilqty > 0) {
            echo htmlspecialchars($oilqty) . " bottles of oil <br/>";
        } else if ($parkqty > 0) {
            echo htmlspecialchars($parkqty) . " spark plugs <br/>";
        }
    }

    $totalamount = $tireqty * TIREPRICE
        + $oilqty * OILPRICE
        + $sparkqty * SPARKPRICE;

    echo "Subtotal: $" . number_format($totalamount, 2) . "<br/>";

    $taxrate = 0.10; // local sales is 10%

    $totalamount = $totalamount * (1 + $taxrate);
    echo "Total including tax: $" . number_format($totalamount, 2) . "</p>";

    echo "<p>Address to ship to is " . htmlspecialchars($address) . "</p>";
    $outputstring = $date . "\t"
        . $tireqty . " tires \t"
        . $oilqty . " oil \t"
        . $sparkqty . " spark plugs \t"
        . $totalamount . "\t"
        . $address . "\n";

    // open file for appending
    try {
        if (!($fp = @fopen("$document_root/../orders/orders.txt", 'ab'))) { // the call to fopen() is still prefaced with the @ error suppression operator. If it fails, PHP will issue a warning that may or may not be reported or logged depending on the error reporting settings in php.ini. This warning will still be issued regardless of whether you raise an exception.
            throw new fileOpenException();
        }
        if (!flock($fp, LOCK_EX)) {
            throw new fileLockException();
        }
        if (!fwrite($fp, $outputstring, strlen($outputstring))) {
            throw new fileWriteException();
        }
        flock($fp, LOCK_UN);
        fclose($fp);
        echo "<p>Order written.</p>";
    } catch (fileOpenException $foe) {
        echo "<p><strong>Orders file could not be opened.<br/>
            Please contact our webmaster for help.</strong>
            </p>";
    } catch (Exception $e) { // Because the other exceptions inherit from Exception, they will be caught by the second catch block. The catch blocks are matched on the same basis as the instanceof operator. This is a good reason for extending your own exception classes from a single class.
        echo "<p><strong>Your order could not be processed at this time.
            Please try again later.</strong>
            </p>";
            echo $e; // if the class (subclass of the Exception class) overrided the __toString () method, then it will be printed as declared in that method;
    }
    /**
      One important warning: If you raise an exception for which you have not written a matching catch block, PHP will report a fatal error.
     */
    ?>

</body>

</html>