<?php
// create short variable name
$document_root = $_SERVER['DOCUMENT_ROOT'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Bob's Auto Parts - Order Results</title>
</head>

<body>
    <h1>Bob's Auto Parts</h1>
    <h2>Customer Orders</h2>

    <?php
    if (file_exists("$document_root/./orders.txt")) {
        echo 'There are orders waiting to be processed.';
    } else {
        echo 'There are currently no orders.';
    }
    echo "<br/>";
    echo filesize("$document_root/./orders.txt");
    echo "<br/>";
    // @$fp = fopen("$document_root/../orders/orders.txt", 'rb');
    @$fp = fopen("$document_root/./orders.txt", 'rb');
    flock($fp, LOCK_SH); // lock file for reading
    if (!$fp) {
        echo "<p><strong>No orders pending.<br />
              Please try again later.</strong></p>";
        exit;
    }

    while (!feof($fp)) { // feof: File End Of File
        $order = fgets($fp);
        // echo htmlspecialchars($order) . "<br />";
        echo htmlspecialchars($order) . '. ' . "\t It is in pointer n " . ftell($fp) . "<br />";
        // echo ' '. ftell($fp);
    }

    @$fp = fopen("$document_root/./orders.txt", 'rb');
    // como el puntero ya esta apuntando al final del archivo, debemos crear un puntero que apunte nuevamente al principio del documento
    rewind($fp); // o bien podemos reiniciar el puntero

    while (!feof($fp)) {
        $char = fgetc($fp);
        $n = ftell($fp);
        if ($n > 100) {
            echo $n . ' ';
            // rewind($fp);
        } else if (!feof($fp)) {
            echo ($char == "\n" ? "<br />" : $char);
        }
    }
    echo "HELLO";

    echo '<br />';
    echo 'Final position of the file pointer is ' . (ftell($fp));
    echo '<br />';
    rewind($fp);
    echo 'After rewind, the position is ' . (ftell($fp));
    echo '<br />';

    flock($fp, LOCK_UN); // release read lock    
    fclose($fp);




    // implementing locks
    @$fp = fopen("$document_root/../orders/orders.txt", 'rb');
    flock($fp, LOCK_SH); // lock file for reading
    // read from file
    flock($fp, LOCK_UN); // release read lock
    fclose($fp);
    ?>
</body>

</html>