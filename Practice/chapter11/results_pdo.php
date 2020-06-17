<!DOCTYPE html>
<html>

<head>
    <title>Book-O-Rama Search Results</title>
</head>

<body>
    <h1>Book-O-Rama Search Results</h1>

    <?php
    /**
      If you want to use a database that doesn’t have a specific library available in PHP, you can use the generic ODBC functions. ODBC, which stands for Open Database Connectivity, is a standard for connections to databases.
     */

    // create short variable names
    $searchtype = $_POST['searchtype'];
    $searchterm = trim($_POST['searchterm']);

    if (!$searchtype || !$searchterm) {
        echo '<p>You have not entered search details.<br/>
       Please go back and try again.</p>';
        exit;
    }

    // whitelist the searchtype

    switch ($searchtype) {
        case 'Title':
        case 'Author':
        case 'ISBN':
            break;
        default:
            echo '<p>That is not a valid search type. <br/>
        Please go back and try again.</p>';
            exit;
    }

    // set up for using PDO
    $user = 'bookorama';
    $pass = 'bookorama123';
    $host = 'localhost';
    $db_name = 'books';

    // set up DSN
    $dsn = "mysql:host=$host;dbname=$db_name"; // format of the connection string

    // connect to database

    try { // all the database interaction code is contained in a try:catch block. By default, if a problem occurs, PDO will throw an exception.

        // To connect to the database, you create an PDO object
        $db = new PDO($dsn, $user, $pass); // This function accepts a connection string, also called a DSN or data source name, that contains all the parameters necessary to connect to the database.


        // perform query

        // This is similar to the way we set up and executed a prepared statement using the mysqli extension. One difference here is that we used a named parameter for replacement. (You can also use these with mysqli, and you can use question mark–style replacement with PDO.)
        $query = "SELECT ISBN, Author, Title, Price
                FROM Books WHERE $searchtype = :searchterm";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':searchterm', $searchterm);
        $stmt->execute();


        // get number of returned rows

        echo "<p>Number of books found: " . $stmt->rowCount() . "</p>"; // we check the number of rows returned with the rowCount () function.
        // Note that in PDO this is a method rather than an attribute, and as such requires the parentheses(()).


        // display each returned row

        while ($result = $stmt->fetch(PDO::FETCH_OBJ)) { // The generic method fetch()can fetch a row in many formats; the parameter PDO::FETCH_OBJ tells it that you would like the row returned as an anonymous object.
            echo "<p><strong>Title: " . $result->Title . "</strong>";
            echo "<br />Author: " . $result->Author;
            echo "<br />ISBN: " . $result->ISBN;
            echo "<br />Price: \$" . number_format($result->Price, 2) . "</p>";
        }


        // disconnect from database

        $db = NULL; // After outputting the returned rows, you finish by freeing the database resource to close the connection

    } catch (PDOException $e) { // The type of exception thrown is a PDOException, and it includes a message about the type of error that occurred
        echo "Error: " . $e->getMessage();
        exit;
    }
    /**
     The advantages of using PDO are that you need to remember only one set of database functions and that the code will require minimal changes if you decide to change the database software.
     On the other hand, because it has to be compatible with all the databases, it has the most limited functionality of any of the function sets. If you have to be compatible with everything, you can’t exploit the special features of anything.
     */
    ?>

</body>

</html>