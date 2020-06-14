<?php
$var = "s";
echo 'outside the function, $var = ' . $var . '<br />';
function afn() // for some reaso, the function cannot be named fn ()
{
    global $var;
    echo 'inside the function, $var = ' . $var . '<br />';
    $var = 'contents';
    echo 'inside the function, $var = ' . $var . '<br />';
}
afn();
echo 'outside the function, $var = ' . $var;



function increment(&$value, $amount = 1)
{
    $value = $value + $amount;
}
$d = 3;
echo '<br/>';
increment($d);
echo $d;
echo '<br/>';


function larger($x, $y)
{
    if ((!isset($x)) || (!isset($y))) {
        echo "This function requires two numbers.";
        return;
    }
    if ($x >= $y) {
        echo $x . "<br/>";
    } else {
        echo $y . "<br/>";
    }
}
$a = 1;
$b = 2.5;
$c = 1.9;
$d = null;
larger($a, $b);
larger($c, $a);
larger($d, $a);
