<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    for ($i = 1; $i <= $numnames; $i++) {
        $temp = "name$i";
        echo htmlspecialchars($$temp) . '<br />'; // or whatever processing you want to do
        // By dynamically creating the names of the variables, you can access each of the fields in turn.
    }
    // As a side note, you can combine variable variables with a for loop to iterate through a series of repetitive form fields. If, for example, you have form fields with names such as name1, name2, name3, and so on, you can process them like this:
    ?>
</body>

</html>