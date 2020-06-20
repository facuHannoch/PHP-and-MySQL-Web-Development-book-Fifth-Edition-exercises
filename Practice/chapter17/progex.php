<?php

/**
 * You could use one of these approaches as an alternative to the directory-browsing script you saw earlier. Note that one of the side effects of using external functions is amply demonstrated by this code: Your code is much less portable, as it uses Unix commands, and the Windows commands shown (but commented out) may not produce the effects you want.
 * 
 * If you plan to include user-submitted data as part of the command you’re going to execute, you should always run it through the escapeshellcmd() function first. This way, you stop users from maliciously (or otherwise) executing commands on your system. You can call it like this:
 * system(escapeshellcmd($command));
 * You should also use the escapeshellarg() function to escape any arguments you plan to pass to your shell command.
 */
// chdir('/path/to/uploads/');
chdir('./uploads/');

// exec version
echo '<h1>Using exec()</h1>';
echo '<pre>';

// unix
// exec('ls -la', $result);

// windows
exec('dir', $result);


foreach ($result as $line)
{
   echo $line.PHP_EOL;
}


echo '</pre>';
echo '<hr />';




// passthru version
echo '<h1>Using passthru()</h1>';
echo '<pre>';

// unix
// passthru('ls -la') ;

// windows
passthru('dir');

echo '</pre>';
echo '<hr />';




// system version
echo '<h1>Using system()</h1>';
echo '<pre>';

// unix
// $result = system('ls -la');

// windows
$result = system('dir');

echo '</pre>';
echo '<hr />';




// backticks version
echo '<h1>Using Backticks</h1>';
echo '<pre>';

// unix
// $result = `ls -al`;

// windows
$result = `dir`;


echo $result;
echo '</pre>';



?>