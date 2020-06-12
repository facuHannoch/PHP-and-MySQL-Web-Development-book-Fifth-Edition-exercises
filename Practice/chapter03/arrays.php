<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- <h2>Hello, what dou you want</h2>
    <form action=""></form> -->
    <?php
    $products = array('Tires', 'Oil', 'Spark Plugs');
    $products[] = 'Hello';
    $products[8] = 'Hello8';
    $products2 = ['Tires', 'Oil', 'Spark Plugs'];
    $products3 = ['Tires' => 100, 'Oil' => 21, 'Spark Plugs' => 3];
    $odds = range(1, 50, 2);

    foreach ($products as $product) {
        echo $product . ' ';
    }
    echo '<br/>';
    foreach ($products3 as $value) {
        echo $value . ' '; //.$products3['key']
    }
    echo '<br/>';
    foreach ($products3 as $key => $value) {
        echo $key . ' ' . $value . ' ';
    }
    echo '<br/>';
    /* Deprecated
    while ($element = each($products3)) {
        echo $element['key'] . '-' . $element['value'] . ' ';
    }
*/
    echo '<br/>';
    echo '<br/>';
    foreach ($products as $key => $value) {
        echo $key . ' ' . $value . ' ';
    }
    echo '<br/>';
    reset($products);
    /* Deprecated
    while (list($product, $price) = each($products3)) {
        echo $product . " – " . $price . "<br />";
    }
*/
    echo '<br/>';

    // $a = {"key", "koy"};
    $a = ["key", "koy", "", 'ko4', "ko5"];
    $a[6] = "ko6";
    $b = ["key", "key1", "koy2", "koy3", "koy4", "koy5", "koy6", "koy7"];

    $c = $a + $b;
    echo '<br/> a:';
    echo '<br/>';
    foreach ($a as $key => $value)
        // echo $key . ' ' . $value . ' ';
        echo 'key: ' . $key . '. ' . 'value: ' . $value . ' ' . '<br/>';
    echo '<br/> b: ';
    echo '<br/>';
    foreach ($b as $key => $value)
        echo 'key: ' . $key . ' ' . 'value: ' . $value . ' ' . '<br/>';
    echo '<br/> c = a + b: ';
    echo '<br/>';
    foreach ($c as $key => $value)
        echo 'key: ' . $key . ' ' . 'value: ' . $value . ' ' . '<br/>';
    echo '<br/>';
    echo '<br/>';

    $a = ["key" => 2, "koy" => 2, 1, "sumpa" => 23];
    $b = ["key" => 2.5, 5, "koy3" => 2, "koy" => 23];

    $c = $a + $b;
    echo '<br/> a: ';
    echo '<br/>';
    foreach ($a as $key => $value)
        echo 'key: ' . $key . ' ' . 'value: ' . $value . ' ' . '<br/>';
    echo '<br/> b: ';
    echo '<br/>';
    foreach ($b as $key => $value)
        echo 'key: ' . $key . ' ' . 'value: ' . $value . ' ' . '<br/>';
    echo '<br/> c = a + b: ';
    echo '<br/>';
    foreach ($c as $key => $value)
        echo 'key: ' . $key . ' ' . 'value: ' . $value . ' ' . '<br/>';
    echo '<br/>';



    // two-dimensional array

    $products = array(
        array('TIR', 'Tires', 100),
        array('OIL', 'Oil', 10),
        array('SPK', 'Spark Plugs', 4)
    );

    echo '|' . $products[0][0] . '|' . $products[0][1] . '|' . $products[0][2] . '|<br />';
    echo '|' . $products[1][0] . '|' . $products[1][1] . '|' . $products[1][2] . '|<br />';
    echo '|' . $products[2][0] . '|' . $products[2][1] . '|' . $products[2][2] . '|<br />';

    echo '<br />';

    for ($row = 0; $row < 3; $row++) {
        for ($column = 0; $column < 3; $column++) {
            echo '|' . $products[$row][$column];
        }
        echo '|<br />';
    }
    echo '<br />';
    echo '<br />';


    $products = array(
        array(
            'Code' => 'TIR',
            'Description' => 'Tires',
            'Price' => 100
        ),

        array(
            'Code' => 'OIL',
            'Description' => 'Oil',
            'Price' => 10
        ),

        array(
            'Code' => 'SPK',
            'Description' => 'Spark Plugs',
            'Price' => 4
        )

    );

    for ($row = 0; $row < 3; $row++) {
        echo '|' . $products[$row]['Code'] . '|' . $products[$row]['Description'] .
            '|' . $products[$row]['Price'] . '|<br />';
    }
    echo '<br />';

    /* Deprecated
    for ($row = 0; $row < 3; $row++) {
        // while (list($key, $value) = each($products[$row])) {
        while (list($key, $value) = each($products[$row])) {
            echo '|' . $value;
        }
        echo '|<br />';
    }
*/



    // three-dimensional array

    $categories = array(
        array(
            array('CAR_TIR', 'Tires', 100),
            array('CAR_OIL', 'Oil', 10),
            array('CAR_SPK', 'Spark Plugs', 4)
        ),

        array(
            array('VAN_TIR', 'Tires', 120),
            array('VAN_OIL', 'Oil', 12),
            array('VAN_SPK', 'Spark Plugs', 5)
        ),

        array(
            array('TRK_TIR', 'Tires', 150),
            array('TRK_OIL', 'Oil', 15),
            array('TRK_SPK', 'Spark Plugs', 6)
        )

    );

    for ($layer = 0; $layer < 3; $layer++) {
        echo 'Layer' . $layer . "<br />";
        for ($row = 0; $row < 3; $row++) {
            for ($column = 0; $column < 3; $column++) {
                echo '|' . $categories[$layer][$row][$column];
            }
            echo '|<br />';
        }
    }


    
    ?>
</body>

</html>