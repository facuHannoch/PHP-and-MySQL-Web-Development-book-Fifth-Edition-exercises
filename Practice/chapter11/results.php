<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book-O-Rama Search Results</title>
</head>

<body>
    <h1>Book-O-Rama Search Results</h1>

    <?php
    /**
      The basic PHP library for connecting to MySQL is called mysqli. The i stands for improved, as there was an older library called mysql. When using the mysqli library in PHP, you can use either an object-oriented or procedural syntax.
     */

    // Comenzamos el script eliminando cualquier espacio en blanco que el usuario haya ingresado inadvertidamente al principio o al final de su término de búsqueda.
    $searchtype = $_POST['searchtype'];
    $searchterm = trim($_POST['searchterm']); // esto lo podemos hacer aplicando la funcion trim () al valor de $_POST['searchterm'].

    // El siguiente paso es verificar que el usuario haya ingresado un término de búsqueda y haya seleccionado un tipo de búsqueda. Tenga en cuenta que verificamos si el usuario ingresó un término de búsqueda después de recortar espacios en blanco desde los extremos de $searchterm.


    // Cuando planea utilizar cualquier ingreso de datos por parte de un usuario, debe filtrarlo adecuadamente para cualquier carácter de control.
    // Primero debemos validar los datos dados por el usuario
    if (!$searchtype || !$searchterm) {
        echo '<p>You have not entered search details.<br/>
        Please go back and try again.</p>';
        exit;
    }

    // lista blanca para searchtype
    switch ($searchtype) { // luego verificamos la variable $ searchtype para asegurarnos de que contenga un valor válido
        case 'Author':
        case 'Title':
        case 'ISBN':
            break;
        default:
            echo 'Tipo de busqueda incorrecta';
            break;
        // Este paso, puede parecer innecesario, pero es importante recordar que puede haber más de una interfaz para su base de datos.
        // Además, es conveniente analizar los datos en caso de que surjan problemas de seguridad debido a que los usuarios provienen de diferentes puntos de entrada.
    }

        // Most of the mysqli functions have an object-oriented interface and a procedural interface. Generally, the differences are that the procedural version function names start with mysqli_ and require you to pass in the resource handle you obtained from mysqli_connect(). Database connections are an exception to this rule because they can be made by the mysqli object’s constructor.



    // Segundo conectamos con la base de datos

    // When using the mysqli library in PHP, you can use either an object-oriented or procedural syntax.
    @$db = new mysqli('localhost', 'bookorama', 'bookorama123', 'Books'); // Esta línea crea una instancia de la clase mysqli y crea una conexión al host localhost con el nombre de usuario bookorama y la contraseña bookorama123. La conexión está configurada para usar la base de datos llamada books.


    // también se puede usar un enfoque procedural 

    // @$db = mysqli_connect('localhost', 'bookorama', 'bookorama123', 'Books'); // This function returns a resource rather than an object. This resource represents the connection to the database, and if you are using the procedural approach, you will need to pass this resource in to all the other mysqli functions. This is similar to the way the file-handling functions, such as fopen(), work.


    if (mysqli_connect_errno()) { // The result of your attempt at connection is worth checking because none of the rest of code will work without a valid database connection.
        echo '<p>Error: Could not connect to database.<br/>
        Please try again later.</p>';
        exit;
    }

    $db->select_db('books'); // via the object-oriented approach
    // mysqli_select_db($db_resource, 'books'); // via the procedural approach


    // Tercero Consultamos la base de datos

    // Preparamos el query que le mandaremos a la base de datos para obtener la informacion deseada (el query no necesita terminar con dos puntos)
    $query = "SELECT ISBN, Author, Title, Price FROM books WHERE $searchtype = ? ";
    // The reason we have a question mark in the query is that we’re going to use a type of query known as a prepared statement. The question mark is a placeholder. This tells MySQL, “whatever we replace the question mark with should be treated as data only, and not code.”
    // Placeholders can only be used for data, and not for column, table, or database names; so $searchtype has to be here, bacause of that we used a whitelisting approach to specify valid values for the $searchtype variable.

    // $query = "SELECT * FROM books WHERE $searchtype = $searchterm"; // esto es inseguro, 
    // de esta forma, un usuario podria inyectar codigo sql no deseado en nuestra base de datos

    $stmt = $db->prepare($query);
    // mysqli_stmt_prepare($stmt); // forma procedural

    $stmt->bind_param('s', $searchterm); //  tell PHP which variables should be substituted for the question marks. The first parameter is a format string, not unlike the format string used in printf(). The value you are passing here ('s') means that the parameter is a string. Other possible characters in the format string are i for integer and b for blob. After this parameter, you should list the same number of variables as you have question marks in your statement. They will be substituted in this order.
    // mysqli_stmt_bind_param(); // forma procedural

    $stmt->execute(); // runs the query. You can then access the number of affected rows and close the statement.
    // mysqli_stmt_execute(); // forma procedural

    // You can change the value of the bound variables and re-execute the statement without having to re-prepare. This capability is useful for looping through bulk inserts.


    // Cuarto obtenemos los resultados

    $stmt->store_result(); // We’d like to get a count of the number of rows returned. To do this, we first tell PHP to retrieve and buffer all of the rows returned from the query

    $stmt->bind_result($isbn, $author, $title, $price); // 
    // mysqli_stmt_bind_result(); // forma procedural

    echo '<p>Number of books found: ' . $stmt->num_rows() . '</p>'; // When you use the object-oriented approach, the number of rows returned is stored in the num_rows member of the result object
    
    // When you use a procedural approach, the function mysqli_num_rows() gives you the number of rows returned by the query. You should pass it the result identifier
    // $num_results = mysqli_num_rows($result);


    // Quinto presentamos los resultados al usuario

    while ($stmt->fetch()) { // Each call to $stmt->fetch() (or, in the procedural version, mysqli_stmt_fetch()) retrieves the next row from the result set and populates the four bind variables with the values from that row, and we can then display them.
        echo "<p><strong>Title : $title</strong>";
        echo "<br />Author: " . $author;
        echo "<br />ISBN: " . $isbn;
        echo "<br />Price: \$" . number_format($price, 2) . "</p>";
    }

    // There are other approaches to fetching data from a query result other than using mysqli_stmt_fetch(). To use these, first we must extract a result set resource from the statement. You can do this using the mysqli_stmt_get_result() function
    $result = $stmt->get_result(); // This function returns an instance of the mysqli_result object, which itself has a number of useful functions for extracting the data.

    $stmt->free_result(); // You can free your result set by calling this function

    $stmt->close(); // to close a database connection.

    // Using this command isn’t strictly necessary because the connection will be closed when a script finishes execution anyway.

    ?>
</body>

</html>