<!DOCTYPE html>

<html>

<head>
    <title>Bob's Auto Parts - Order Results</title>
</head>

<body>
    <h1>Bob's Auto Parts</h1>
    <h2>Order Results</h2>
    <?php
    // echo '<p>Order processed</p>';

    // create short variable names 
    $tireqty = $_POST['tireqty'];
    $oilqty = $_POST['oilqty'];
    $sparkqty = $_POST['sparkqty'];
    $find = $_POST['find'];

    // the input data be filter should before use it
    //echo $tireqty.' tires<br />'; // this aproach is not recommended
    //echo "<p>sparkqty: $sparkqty </p><hr>";

    $totalqty = 0;
    $totalqty = $tireqty + $oilqty + $sparkqty;

    if ($totalqty == 0):
        echo 'You did not order anything on the previous page!: <br/>';
        exit;
    else:
        echo '<p>Your order is as follows: </p>';
        echo htmlspecialchars($tireqty) . ' tires<br/>';
        echo htmlspecialchars($oilqty) . ' bottles of oilqty<br/>';
        echo htmlspecialchars($sparkqty) . ' spark plugs<br/>';
        echo '<p>Order processed at</p>';
        echo date('H:i, jS F Y');
        echo '</p>';
     endif;
    /*
    if ($totalqty == 0) {
        echo 'You did not order anything on the previous page!: <br/>';
        exit;
    } else {
        echo '<p>Your order is as follows: </p>';
        echo htmlspecialchars($tireqty) . ' tires<br/>';
        echo htmlspecialchars($oilqty) . ' bottles of oilqty<br/>';
        echo htmlspecialchars($sparkqty) . ' spark plugs<br/>';
        echo '<p>Order processed at</p>';
        echo date('H:i, jS F Y');
        echo '</p>';
    }
    */

    echo "<p>Items ordered: " . $totalqty . "<br />";

    $totalamount = 0.00;

    define('TIREPRICE', 100);
    define('OILPRICE', 10);
    define('SPARKPRICE', 4);

    $totalamount = $tireqty * TIREPRICE + $oilqty * OILPRICE + $sparkqty * SPARKPRICE;
    echo "Subtotal: $" . number_format($totalamount, 2) . "<br/>";

    $taxrate = 0.10;  // local sales tax is 10%

    $totalamount = $totalamount * (1 + $taxrate);

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
/*
    if ($find == "a") {
        echo "<p>Regular customer.</p>";
    } elseif ($find == "b") {
        echo "<p>Customer referred by TV advert.</p>";
    } elseif ($find == "c") {
        echo "<p>Customer referred by phone directory.</p>";
    } elseif ($find == "d") {
        echo "<p>Customer referred by word of mouth.</p>";
    } else {
        echo "<p>We do not know how this customer found us.</p>";
    }
*/
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
    }
    ?>
</body>

</html>