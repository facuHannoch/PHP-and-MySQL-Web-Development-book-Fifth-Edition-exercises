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

    // the input data be filter should before use it
    //echo $tireqty.' tires<br />'; // this aproach is not recommended
    //echo "<p>sparkqty: $sparkqty </p><hr>";

    echo '<p>Your order is as follows: </p>';
    echo htmlspecialchars($tireqty) . ' tires<br/>';
    echo htmlspecialchars($oilqty) . ' bottles of oilqty<br/>';
    echo htmlspecialchars($sparkqty) . ' spark plugs<br/>';
    echo '<p>Order processed at</p>';
    echo date('H:i, jS F Y');
    echo '</p>';

    define('TIREPRICE', 100);
    define('OILPRICE', 10);
    define('SPARKPRICE', 4);
    echo TIREPRICE;

    /*
    $a = "af";
    $b = 2;
    $result = $a + $b;
    echo $result;
    */
    $b = 6 + ($a = 5);
    echo $b;
    echo $a;

    $a = @(57 / 0); // error suspension operator

    $out = `dir c:`;
    $out = `mkdir hello`; // PHP attempts to execute whatever is contained between the backticks as a command at the server’s command line.

    echo '<pre>' . $out . '</pre>';

    $a = 56;


    echo gettype($a) . '<br />';
    settype($a, 'float');
    echo gettype($a) . '<br />';


    echo 'isset($tireqty): ' . isset($tireqty) . '<br />';
    echo 'isset($nothere): ' . isset($nothere) . '<br />';
    echo 'empty($tireqty): ' . empty($tireqty) . '<br />';
    echo 'empty($nothere): ' . empty($nothere) . '<br />';


    phpinfo();
    ?>
</body>

</html>