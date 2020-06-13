<?php
$string = "Hello yo soy el string. Entre -<br/>- hay un ' br<>', entre -\n- hay un ' \ n.' \0 sa";
// Debemos evitar que el usuario ingrese ciertos carácteres (como por ejemplo <br/>), ya que no sólo podría "romper" la página, sino que también podría efectuar un ataque, injectando código por ejemplo
// The main issue in email is that headers are separated by the character string \r\n (carriage return-line feed). We need to take care that user data we use in the email headers does not contain these characters, or we run the risk of a set of attacks, called header injection. 
echo $string;
echo '<br/>';
echo '<br/>';

echo "html special characters: "; // La función htmlspecialchars () convierte los caracteres que tienen un significado especial en HTML a su entidad HTML equivalente.
echo htmlspecialchars($string);
echo '<br/>';
echo '<br/>';

echo "trim: "; // La función trim () elimina espacios en blanco desde el inicio y el final de una cadena y devuelve la cadena resultante.
// The characters it strips by default are newlines and carriage returns (\n and \r), horizontal and vertical tabs (\t and \x0B), end-of-string characters (\0), and spaces.
echo trim($string);
echo '<br/>';
echo '<br/>';

echo "nl2br: "; // La función nl2br () toma una cadena como parámetro y reemplaza todos los saltos de líneas con la etiqueta HTML <br/>. Esta capacidad es útil para hacer eco de una cadena larga en el navegador.
echo nl2br($string);
echo '<br/>';
echo '<br/>';

echo "nl2br ( htmlspecialchars() ): "; // Observe que primero aplicamos la función htmlspecialchars () y luego la función nl2br (). Esto se debe a que si los hiciéramos en el orden opuesto, las etiquetas <br/> insertadas por la función nl2br () serían traducidas a entidades HTML por la función htmlspecialchars () y, por lo tanto, no tendrían ningún efecto.
echo nl2br(htmlspecialchars($string));
echo '<br/>';
echo '<br/>';

echo "htmlspecialchars ( nl2br() ): ";
echo htmlspecialchars(nl2br($string));
echo '<br/>';
echo '<br/>';

echo "strtoupper: " . strtoupper($string); // convierte la cadena en mayúsculas 
echo '<br/>';
echo "strtolower: " . strtolower($string); // convierte la cadena en minúscula 
echo '<br/>';
echo "ucfirst: " . ucfirst($string); // convierte la primera letra en mayúscula
echo '<br/>';
echo "ucwords: " . ucwords($string); // convierte la primera letra de cada palabra en mayúscula
echo '<br/>';
echo '<br/>';


$pep = "123456789pePepepe4spepe4spepe4spepe4spepe4spepe4spepepepe@gmail.com";
echo '<br/>';
echo $pep . '<br/>';
echo "explode (pe4): "; // Esta función toma un string de entrada y la divide en partes en una cadena de separación especificada. Las piezas se devuelven en un array. Puede limitar el número de piezas con el parámetro límite (opcional).
// esta función es case sensitive, distingue entre mayúsculas y minúsculas
$stringsitos = explode("pe4", "pePepepe4spepe4spepe4spepe4spepe4spepe4spepepepe@gmail.com");
// $stringsitos = explode(" ",$string);
foreach ($stringsitos as $value)
    echo "$value" . '<br/>';
echo '<br/>';
echo '<br/>';

// You can reverse the effects of explode() by using either implode() or join(), which are identical.
echo "implode (pe): ";
$stringsitoUnido = implode("pe", $stringsitos); // This statement takes the array elements from $stringsitos and joins them with the string passed in the first parameter.
echo "$stringsitoUnido" . '<br/>';
echo '<br/>';
echo '<br/>';


echo $pep . '<br/>';
echo "strtok (e): ";
$token = strtok($pep, "e"); // To get the first token from a string, you call strtok() with the string you want tokenized and a separator. 
while ($token != "") {
    echo $token . ' ';
    $token = strtok("e"); // To get the subsequent tokens from the string, you just pass a single parameter—the separator. The function keeps its own internal pointer to its place in the string. If you want to reset the pointer, you can pass the string into it again.
}
echo '<br/>';
echo '<br/>';

echo $pep . '<br/>';
echo 'substr (2 - (-8)): ';
$substring = substr($pep, 2, -8); // The substr() function enables you to access a substring between given start and end points of a string. 
// If you call it with a positive number for start (only), you will get the string from the start position to the end of the string.
// If you call substr() with a negative start (only), you will get the string from the end of the string minus start characters to the end of the string.
// The length parameter can be used to specify either a number of characters to return (if it is positive) or the end character of the return sequence (if it is negative).
echo $substring;
echo '<br/>';
echo '<br/>';


echo $pep . '<br/>';
echo 'strstr (e@): ';
echo strstr($pep, "e@"); // You pass the function a haystack to be searched and a needle to be found. If an exact match of the needle is found, the function returns the haystack from the needle onward; otherwise, it returns false.
// If the needle occurs more than once, the returned string will start from the first occurrence of needle.
echo '<br/>';
//
echo 'strstr (e@, true): ';
echo strstr($pep, "e@", true); // If the before_needle parameter is set to true, the function will return the portion of the string prior to the needle.
echo '<br/>';
echo '<br/>';


echo $pep . '<br/>';
echo 'stristr (e@): ';
echo stristr($pep, "e@"); // stristr(), very similar to strstr (), but is not case sensitive
echo '<br/>';
echo '<br/>';


echo $pep . '<br/>';
echo 'strrchr (e@): ';
echo strrchr($pep, "e@"); // strrchr() returns the haystack from the last occurrence of the needle onward. It also searches for only a single character (the first character of the string passed in needle), which is something of a gotcha.
echo '<br/>';
echo '<br/>';


echo $pep . '<br/>';
echo "strpos (gmail): ";
echo strpos($pep, "gmail"); // The functions strpos() and strrpos() operate in a similar fashion to strstr(), except, instead of returning a substring, they return the numerical position of a needle within a haystack. The PHP manual recommends using strpos() instead of strstr() to check for the presence of a string within a string because it runs faster.
// The third parameter especifies at what position PHP starts looking for the character
// The PHP manual recommends using strpos() instead of strstr() to check for the presence of a string within a string because it runs faster.
echo '<br/>';
echo '<br/>';
// strrpos ()
// The strrpos() function is almost identical but returns the position of the last occurrence of the needle in the haystack.
// NOTE: if the needle is not in the string, strpos() or strrpos() will return false.
// This result can be problematic because false in a weakly typed language such as PHP is in many contexts equivalent to '0' — that is, the first location in a string.

// You can avoid this problem by using the === operator to test return values.



echo $pep . '<br/>';
echo 'str_replace (e@, @e): ';
echo str_replace(["", "", "gmail", ".com"], ["_@_", "-@-"], $pep); // This function replaces all the instances of needle in haystack with new_needle and returns the new version of haystack. The optional fourth parameter, count, contains the number of replacements made.
// You can pass all parameters as arrays, and the str_replace() function works remarkably intelligently. You can pass an array of words to be replaced, an array of words to replace them with (respectively), and an array of strings to apply these rules to. The function then returns an array of revised strings.
echo '<br/>';
echo $pep . '<br/>';
echo 'str_replace (["", "", "gmail", ".com", "e"], ["_@_", "-@-"]): ';
echo str_replace(["", "p", "gmail", ".com", "e"], ["_@_", "-@-"], $pep);
echo '<br/>';
echo '<br/>';

echo '<br/>';
echo $pep . '<br/>';
echo 'substr_replace (kabum, 3): ';
echo substr_replace($pep, "kabum", "3", 0); // The function substr_replace() finds and replaces a particular substring of a string based on its position.
// If length is zero, the replacement string will actually be inserted into the string without overwriting the existing string. A positive length represents the number of characters that you want replaced with the new string; a negative length represents the point at which you would like to stop replacing characters, counted from the end of the string.
// Básicamente elimina lo que está contando desde la posición determinada en start, hasta lo que diga length, y luego pega la cadena o valor especificado en replacement (segundo parámetro)
echo '<br/>';
echo '<br/>';



// PCRE regular expression functions 
/**
//  * Anything enclosed in the square brackets ([ and ]) is a character class—a set of characters to which a matched character must belong. Note that the expression in the square brackets matches only a single character.
 * 
 * /shop/       // match the word “shop”
 * 
 * /http:\/\//  // If you need to match a literal / inside the regular expression, you will need to escape it with the \ (backslash) character.
 * 
 * #http://#    // If your pattern contains many instances of your chosen delimiter, you might consider choosing a different delimiter.
 * 
 * /shop/i      // You may sometimes wish to add a pattern modifier after the closing delimiter.
 * 
 * /.at/        // you can use the . character as a wildcard for any other single character except a newline (\n). This matches the strings "cat", "sat", and "mat", among others.
 * 
 * /[a-z]at/    // the first character can be any letter from a to z
 * 
 * /[aeiou]/    // means any vowel
 * 
 * /[a-zA-Z]/   // describe a range with -
 * 
//  * . The caret symbol (^, sometimes called circumflex) means not when it is placed inside the square brackets.
 * /[^a-z]/     // matches any character that is not between a and z
 * 
 * The enclosing square brackets delimit the class, and the inner square brackets are part of the class name
 * /[[:alpha]1-5]   // describes a class that may contain an alphabetical character, or any of the digits from 1 to 5.
 * 
//  * you may want to specify that there might be multiple occurrences of a particular string or class of character. You can represent this using three special characters in your regular expression. The symbol means that the pattern can be repeated zero or more times, and the + symbol means that the pattern can be repeated one or more times. The ? symbol means that the pattern should appear either once or not at all. The symbol should appear directly after the part of the expression that it applies to.
 * 
 * /[[:alnum:]]+/   // means “at least one alphanumeric character.”
 * 
//  *  You can split expressions using parentheses, exactly the same way as you would in an arithmetic expression.
 * 
 * /(very )*large/  // matches "large", "very large", "very very large", and so on.
 * 
//  * You can specify how many times something can be repeated by using a numerical expression in curly braces ({}). You can show an exact number of repetitions ({3} means exactly three repetitions), a range of repetitions ({2,4} means from two to four repetitions), or an open-ended range of repetitions ({2,} means at least two repetitions).
 * 
 * /(very ){1,3}/   // matches "very ", "very very ", and "very very very ".
 * 
//  * The caret symbol (^) is used at the start of a regular expression to show that it must appear at the beginning of a searched string, and $ is used at the end of a regular expression to show that it must appear at the end.
 * 
 * /^bob/       // matches bob at the start of a string.
 * 
 * /com$/       // matches com at the end of a string.
 * 
 * /^[a-z]$/    // this pattern matches a string containing only a single character between a and z.
 * 
//  * You can represent a choice in a regular expression with a vertical pipe.
 * 
 * /com|edu|net/    // match com, edu, or net.
 * 
//  * A backreference in a pattern is indicated by a backslash followed by a digit (and possibly more than one, depending on the context). It is used for matching the same subexpression appearing in more than one place in a string, without explicitly specifying the value.
 * 
 * /^([a-z]+) \1 black sheep/   // The \1 here is a backreference to the previously matched subexpression—that is, ([a-z]+), which is one or more alphabetical characters.
 * Given this pattern, the string
 *   baa baa black sheep
 * will match, but the string
 *   blah baa black sheep
 * will not
 * 
//  * If multiple subexpressions have previously been encountered, they are effectively numbered in order starting at 1, if you wish to use them in backreferences.
 */

echo $pep . '<br/>';
echo 'preg_match (/([p]+[a-z]){2}/): ';
echo preg_match('/([p][a-z]){2}/', $pep, $results); // This function searches the subject string, looking for matches to the regular expression in pattern. If a match is found for the expression, the full match will be stored in $matches[0], and each of the subsequent array elements will store a match for each matched subexpression.
// The preg_match() function returns 1 if a match was found, 0 if a match was not found, and FALSE if an error occurred. This means you need to use identity (===) to test what is returned, to avoid confusion between 0 and FALSE.
echo '<br/>';
echo 'preg_match (/@{2}/): ';
echo preg_match('/@{2}/', $pep, $results);
echo '<br/>';
echo 'preg_match (/@+[comg]/): ';
echo preg_match('/@+[comg]/', $pep, $results);
echo '<br/>';
echo 'preg_match (/@[com]/): ';
echo preg_match('/@[com]/', $pep, $results);
echo '<br/>';
echo 'preg_match (/@([comg]$)/): ';
echo preg_match('/@+([comg]$)/', $pep, $results);
echo '<br/>';

foreach ($results as $value) {
    echo $value . '<br/>';
}
echo '<br/>';
echo '<br/>';

echo $pep . '<br/>';
echo 'preg_replace(/[^pPe]/, Z): '; // si el caracter no es ni p ni P ni e, lo reemplazamos por Z
echo preg_replace('/[^pPe]/', 'Z', $pep); // This function searches for the regular expression pattern in the subject string and replaces it with the string replacement.
// The limit parameter specifies the maximum number of replacements to make. The default is -1, meaning no limit.
// The count parameter, if supplied, will be filled with the total number of replacements made.
echo '<br/>';
echo '<br/>';

echo $pep . '<br/>';
echo 'preg_split(/pepe4/): ';
$pepitos = preg_split('/p/', $pep/*, PREG_SPLIT_NO_EMPTY*/); // This function splits the string subject into substrings on the regular expression pattern and returns the substrings in an array. The limit parameter limits the number of items that can go into the array. (The default value, -1, means no limit.)
// The flags parameter accepts the following constants, which can be combined via bitwise OR (|): 
// PREG_SPLIT_NO_EMPTY, means that only non-empty pieces will be returned. 
// PREG_SPLIT_DELIM_CAPTURE means that the delimiters will be returned as pieces. 
// PREG_SPLIT_OFFSET_CAPTURE means that the location of each piece in the original string will be returned in the same way that the preg_match() function does it.
echo '<br/>';
foreach ($pepitos as $value) {
    echo $value . '<br/>';
}
echo '<br/>';
echo '<br/>';

