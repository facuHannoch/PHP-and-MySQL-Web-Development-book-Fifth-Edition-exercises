<?php
function my_print($value)
{
    echo "$value<br />";
}
array_walk($array, 'my_print');

// array_walk($array, function($value){ echo "$value <br/>"; });
array_walk($array, function ($value) {
    echo "$value <br/>";
});

// $printer =  function($value){ echo "$value <br/>"; };
$printer =  function ($value) {
    echo "$value <br/>";
};

$products = [
    'Tires' => 100,
    'Oil' => 10,
    'Spark Plugs' => 4
];
$markup = 0.20;

$apply = function (&$val) use ($markup) { // This is almost the opposite of the global keyword; it says the variable in global scope, $markup, should be available inside this anonymous function.
    $val = $val * (1 + $markup);
};

array_walk($products, $apply);

array_walk($products, $printer);
?>