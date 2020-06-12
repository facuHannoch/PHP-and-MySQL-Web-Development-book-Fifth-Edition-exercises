<?php
$products = ["Hello", "Hello2", "Hello3", "Hello4", "Hello5", "Hello6", "Hello7", "hello", "Hello", "Hello"];
$numbers = range(1, 20);
foreach ($products as $key => $value) {
    echo 'key: ' . $key . '. ' . 'value: ' . $value . ' ' . '<br/>';
}
echo '<br/>';
echo 'key: ' . $key . '. ' . 'value: ' . $value . ' ' . '<br/>';
echo '<br/>';
prev($products);
echo 'key: ' . $key . '. ' . 'value: ' . $value . ' ' . '<br/>';
echo prev($products);
echo '<br/>';
echo 'key: ' . $key . '. ' . 'value: ' . $value . ' ' . '<br/>';

function my_print($value)
{
    echo "$value<br />";
}
array_walk($products, 'my_print');

foreach ($products as $key => $value) {
    echo 'key: ' . $key . '. ' . 'value: ' . $value . ' ' . '<br/>';
}
echo '<br/>';


function my_multiply(&$value, $key, $factor)
{
    $value *= $factor;
}
array_walk($numbers, 'my_multiply', 3);

foreach ($numbers as $key => $value) {
    echo 'key: ' . $key . '. ' . 'value: ' . $value . ' ' . '<br/>';
}
echo '<br/>';
echo '<br/>';
echo '<br/>';



echo count($products);
echo '<br/>';
echo sizeof($products);
echo '<br/>';
foreach (array_count_values($products) as $key => $value) {
    echo 'key: ' . $key . '. ' . 'value: ' . $value . ' ' . '<br/>';
}
echo '<br/>';

$productazos = ["Hello" => "Hello", "Hello" => 2, "hello" => 1, "hellos" => ["helito1", "helito2", "helito3"]];
foreach ($productazos as $key => $value) {
    if (!is_array($value)) // evitamos el array porque causa problemas al querer imprimirlo asi nomas 
        echo 'key: ' . $key . '. ' . 'value: ' . $value . ' ' . '<br/>';
}
echo '<br/>';

extract($productazos);
echo '<br/>';

echo $hello;
echo '<br/>';

foreach ($hellos as $key => $value) {
    echo 'key: ' . $key . '. ' . 'value: ' . $value . ' ' . '<br/>';
}
echo '<br/>';
echo '<br/>';


$array = array('key1' => 'value1', 'key2' => 'value2', 'key3' => 'value3');
foreach ($array as $key => $value) {
    echo 'key: ' . $key . '. ' . 'value: ' . $value . ' ' . '<br/>';
}
echo '<br/>';
extract($array, EXTR_PREFIX_ALL, 'my_prefix');
echo "$my_prefix_key1 $my_prefix_key2 $my_prefix_key3";
