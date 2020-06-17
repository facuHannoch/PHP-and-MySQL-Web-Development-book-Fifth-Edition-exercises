<!DOCTYPE html>
<html>

<head>
    <title>Book-O-Rama Book Entry Results</title>
</head>

<body>
    <h1>Book-O-Rama Book Entry Results</h1>
    <?php

    if (
        !isset($_POST['ISBN']) || !isset($_POST['Author'])
        || !isset($_POST['Title']) || !isset($_POST['Price'])
    ) {
        echo "<p>You have not entered all the required details.<br />
             Please go back and try again.</p>";
        exit;
    }


    // create short variable names
    $isbn = $_POST['ISBN'];
    $author = $_POST['Author'];
    $title = $_POST['Title'];
    $price = $_POST['Price'];
    // First, we check that all the form fields were filled in and then, because the price is stored in the database as a float, we make sure that it is one with doubleval()
    $price = doubleval($price); // This also takes care of any currency symbols that the user might have typed into the form.
    
    @$db = new mysqli('localhost', 'bookorama', 'bookorama123', 'books');

    if (mysqli_connect_errno()) {
        echo "<p>Error: Could not connect to database.<br/>
             Please try again later.</p>";
        exit;
    }

    // We connect to the database by instantiating the mysqli object and setting up a query to send to the database. In this case, the query is an SQL INSERT

    $query = "INSERT INTO Books VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('sssd', $isbn, $author, $title, $price); // In this case, we’re passing four parameters into our prepared statement, so the format string is four characters long. In that string, each s represents one of the strings, and the d represents a double.
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo  "<p>Book inserted into the database.</p>";
    } else {
        echo "<p>An error has occurred.<br/>
              The item was not added.</p>";
    }
    $db->close();  ?>
</body>

</html>