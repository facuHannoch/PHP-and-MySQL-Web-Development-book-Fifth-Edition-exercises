<?php

function reverse_r($str)
{
    // echo $str . '<br/>';
    if (strlen($str) > 0) {
        reverse_r(substr($str, 1));
        // echo $str.'<br/>';
    }
    // echo $str . '<br/>';
    echo substr($str, 0, 1);
    // echo $str . '<br/>';
    return;
    // Each call the function makes to itself makes a new copy of the function code in the server’s memory, but with a different parameter. It is like pretending that you are actually calling a different function each time. This stops the instances of the function from getting confused.
    // With each call, the length of the string passed in is tested. When you reach the end of the string (strlen()==0), the condition fails. The most recent instance of the function (reverse_r('o')) then goes on and performs the next line of code, which is to echo the first character of the string it was passed; in this case, ‘o’.
    // Next, this instance of the function returns control to the instance that called it, namely reverse_r('lo'). This function then prints the first character in its string—'l'—and returns control to the instance that called it.
    // The process continues—printing a character and then returning to the instance of the function above it in the calling order—until control is returned to the main program.
}

function reverse_i($str)
{
    for ($i = 1; $i <= strlen($str); $i++) {
        echo substr($str, -$i, 1);
    }
    return;
}

reverse_r('Hello');
echo '<br />';
reverse_i('Hello');
