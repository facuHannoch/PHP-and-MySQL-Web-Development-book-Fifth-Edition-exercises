<?php
/**
 * Generators are similar to iterators in many ways, but far simpler. Several other programming languages, such as Python, support generators. One way of thinking about generators is that the definition of a generator looks like a function but when run, it behaves like an iterator.
 * 
 * The difference in how you write a generator versus a regular function is that instead of using the return keyword to pass a value back to the calling code, you use the keyword yield. This is typically inside a loop, because you will use it to return multiple values.
 * 
 * You should call a generator function in a foreach loop. This creates a Generator object that effectively saves the state inside the generator function. On each iteration of the external foreach loop, the generator advances one internal iteration.
 * 
 * It’s probably easiest to understand this with an example. For this, consider the following simple implementation of the game. In this game, we count upward from 1, and each time we see 3 or a multiple of 3, we instead say “fizz,” and each time we see 5 or a multiple of 5, we say “buzz.” If the number is divisible by 3 and 5, we say “fizzbuzz.”
 * 
 */
function fizzbuzz($start, $end)
{
    $current = $start;
    while ($current <= $end) {
        if ($current % 3 == 0 && $current % 5 == 0) {
            yield "fizzbuzz";
        } else if ($current % 3 == 0) {
            yield "fizz";
        } else if ($current % 5 == 0) {
            yield "buzz";
        } else {
            yield $current;
        }
        $current++;
    }
}

foreach (fizzbuzz(1, 20) as $number) {
    echo $number . '<br />';
}
/**
 * We call the generator function in a foreach loop. On the first call to the function, PHP creates an internal generator object. When the function is called, it executes until it reaches a yield statement, and then it passes execution back to the calling context.
 * 
 * The most important thing to note is that a generator keeps state. That is, on the next iteration of the external foreach loop, the generator resumes execution where it left off the last time, and will continue executing until it reaches the next yield statement. In this way, we pass execution back and forth between the main line of code and the generator function. In each iteration of the foreach loop, the next value in the sequence is retrieved from the generator.
 * 
 * If you need a mental model for this, you can think of it as a fancy type of array of the possible values. The key difference between a generator and, say, a function that fills an array with all the possible values, is that it uses lazy execution. Only one value is created and held in memory at any time. This makes generators particularly useful when dealing with large datasets that will not easily fit in memory.
 * 
 */
