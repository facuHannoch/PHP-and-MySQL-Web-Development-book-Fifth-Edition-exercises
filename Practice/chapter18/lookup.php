<!DOCTYPE html>
<html>

<head>
    <title>Stock Quote From NASDAQ</title>
</head>

<body>

    <?php
    //choose stock to look at
    $symbol = 'GOOG';
    echo '<h1>Stock Quote for ' . $symbol . '</h1>';

    $url = 'https://finance.yahoo.com/quote/%5EIXIC?p=%5EIXIC' .
        '?s=' . $symbol . '&e=.csv&f=sl1d1t1c1ohgv';

    if (!($contents = file_get_contents($url))) { // The call to file_get_contents() returns the entire text of the file located at that URL, stored in $contents.
        die('Failed to open ' . $url);
    }
    
    // extract relevant data
    // echo($contents);
    list($symbol, $quote, $date, $time) = explode(',', $contents); // You can use the list() function to place comma-delimited content into specific variables precisely because the file you have accessed is consistently formatted.
    // That is to say, when opening the file at the URL specified in the script, you assume it will always contain the stock symbol, the last stock purchase price, and the date and time of that purchase in that specific order. If the file structure changes, your script will also have to change, so always pay careful attention to the resources you are consuming via automated scripts, especially if they are not part of a well-documented and maintained public API.
    $date = trim($date, '"');
    $time = trim($time, '"');

    echo '<p>' . $symbol . ' was last sold at: $' . $quote . '</p>';
    echo '<p>Quote current as of ' . $date . ' at ' . $time . '</p>';

    // acknowledge source
    echo '<p>This information retrieved from <br /><a href="' . $url . '">' . $url . '</a>.</p>';

    ?>
</body>

</html>