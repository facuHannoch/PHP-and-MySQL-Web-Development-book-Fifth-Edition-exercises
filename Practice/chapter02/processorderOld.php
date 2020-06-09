<!DOCTYPE html>

<html>

<head>
    <title>Bob's Auto Parts - Order Results</title>
</head>

<body>
    <h1>Bob's Auto Parts</h1>
    <h2>Order Results</h2>

    <?php
    $tireqty = $_POST['tireqty'];
    $oilqty = $_POST['oilqty'];
    $sparkqty = $_POST['sparkqty'];
    $find = $_POST['find'];
    $totalqty = 0;
    $totalqty = $tireqty + $oilqty + $sparkqty;

    $totalamount = 0.00;

    // $document_root = $_SERVER['DOCUMENT_ROOT'];

    define('TIREPRICE', 100);
    define('OILPRICE', 10);
    define('SPARKPRICE', 4);

    if ($totalqty == 0) :
        echo 'You did not order anything on the previous page!: <br/>';
        exit;
    else :
        echo '<p>Your order is as follows: </p>';
        echo "<p>Items ordered: " . $totalqty . "<br />";
        echo htmlspecialchars($tireqty) . ' tires<br/>';
        echo htmlspecialchars($oilqty) . ' bottles of oilqty<br/>';
        echo htmlspecialchars($sparkqty) . ' spark plugs<br/>';

        $totalamount = $tireqty * TIREPRICE + $oilqty * OILPRICE + $sparkqty * SPARKPRICE;
        echo "Subtotal: $" . number_format($totalamount, 2) . "<br/>";

        $taxrate = 0.10;  // local sales tax is 10%
        $totalamount = $totalamount * (1 + $taxrate);
    endif;




    $document_root = $_SERVER['DOCUMENT_ROOT'];

    // $fp = fopen("$document_root/../orders/orders.txt", 'w');
    // @$fp = fopen("$document_root/../orders/orders.txt", 'w');
    // The @ symbol in front of the call to fopen() tells PHP to suppress any errors resulting from the function call. Usually, it’s a good idea to know when things go wrong, but in this case we’re going to deal with that problem elsewhere.
    $fp = @fopen("$document_root/../orders/orders.txt", 'w');
    // Using this method tends to make it less obvious that you are using the error suppression operator, so it may make your code harder to debug.
    if (!$fp) {
        echo "<p>
                    <strong> Your order could not be processed at this time. Please try again later.</strong></p>
            </body>
        </html>";
        exit;
    }
    $outputstring = $date . '\t' . $tireqty . ' tires \t' . $oilqty . ' oil\t'
        . $sparkqty . ' spark plugs\t\$' . $totalamount
        . '\t' . $address . '\n';

    fwrite($fp, $outputString, strlen($outputString));

    /*
        echo "Total including tax: $" . number_format($totalamount, 2) . "</p>";

        if ($tireqty < 10) {
            $discount = 0;
        } elseif (($tireqty >= 10) && ($tireqty <= 49)) {
            $discount = 5;
        } elseif (($tireqty >= 50) && ($tireqty <= 99)) {
            $discount = 10;
        } elseif ($tireqty >= 100) {
            $discount = 15;
        }
        echo "The discount is $discount <br/>";



        
        switch ($find) {
            case "a":
                echo "<p>Regular customer.</p>";
                break;
            case "b":
                echo "<p>Customer referred by TV advert.</p>";
                break;
            case "c":
                echo "<p>Customer referred by phone directory.</p>";
                break;
            case "d":
                echo "<p>Customer referred by word of mouth.</p>";
                break;
            default:
                echo "<p>We do not know how this customer found us.</p>";
                break;
        }*/
    ?>
</body>

</html>