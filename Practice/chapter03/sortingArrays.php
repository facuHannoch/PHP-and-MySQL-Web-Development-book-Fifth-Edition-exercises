<?php
$products = array('Tires', 'Oil', 'Spark Plugs');
$range = range(100, -100);
foreach ($products as $key => $value)
    echo $value . ' ';
echo '<br/>';
foreach ($range as $value)
    echo $value . ' ';

sort($products);
sort($range);

echo '<br/>';
echo '<br/>';
foreach ($products as $key => $value) {
    echo $value . ' ';
}
echo '<br/>';
foreach ($range as $value)
    echo $value . ' ';

$products = array(
    array('TIR', 'Tires', 100),
    array('OIL', 'Oil', 10),
    array('SPK', 'Spark Plugs', 4)
);
/*
array_multisort($products);
for ($i=0; $i<count($products); $i++) {
    $product = $products;
    foreach ($product as $key => $value) {
        echo $value . ' ';
    }
}
*/
for ($row = 0; $row < 3; $row++) {
    for ($column = 0; $column < 3; $column++) {
        echo '|' . $products[$row][$column];
    }
    echo '|<br />';
}
echo '<br/>';

// comparing multiple arrays with a user-defined sort
function compare($x, $y)
// To be used by usort(), the compare() function must compare $x and $y. The function must return 0 if $x equals $y, a negative number if it is less, or a positive number if it is greater. The function will return 0, 1, or -1, depending on the values of $x and $y.
{
    if ($x[2] == $y[2]) {
        return 0;
    } else if ($x[2] < $y[2]) {
        return -1;
    } else {
        return 1;
    }
}
function rcompare($x, $y) // a reverse function of compare
// the only thing that change is that when it returned 1 now return 1, and vice versa
{
    if ($x[2] == $y[2]) {
        return 0;
    } else if ($x[2] < $y[2]) {
        return 1;
    } else {
        return -1;
    }
}

// we call the compare function
usort($products, 'rcompare');

echo '<br/>';
for ($row = 0; $row < 3; $row++) {
    for ($column = 0; $column < 3; $column++) {
        echo '|' . $products[$row][$column];
    }
    echo '|<br />';
}
