<?php

/**
 * Namespaces are a way of grouping together a set of classes and/or functions. They can be used to collate a set of related pieces into a library.
 * 
 * First, you can see we are using the same namespace declaration in multiple files. This is perfectly legal. You could go on to declare classes and functions in this file, and they would be in the elNamespace namespace. This provides another nice way to organize code in a modular fashion. In this case, putting the namespace declaration at the top, and hence putting us into the namespace, means that we can use things declared inside that namespace without a prefix.
 * 
 * It’s important to note that any class referenced inside a namespace without a fully qualified namespace is assumed to be in the current namespace. However, PHP will look for functions and constants without fully qualified namespaces in the current namespace, but if they are not found, PHP will fall back to looking for them in the global namespace. This is not true of classes.
 * 
  Any code that is not in a declared namespace is considered to be in the global namespace.
 * 
 */

/**
  Code in a file following a namespace declaration is automatically in that namespace. Note that if you want to declare namespaces in a file, a namespace declaration must be the first line in that file.
 */

namespace elNamespace; // To create a namespace, you use the keyword namespace, followed by the name of the namespace.

use orders; // The use statement can be used to import and alias namespaces. 

use function elNamespace\theSecond\sayHello; // This code enables us to use the shortcut or alias page to mean the namespace elNamespace\theSecond\sayHello.

use elNamespace\theSecond as elSegundo; // We could also alias it as something completely different

include 'orders.php';
include 'class.php';

sayHello();
echo '<br/>';
theSecond\sayHello();
elSegundo\sayHello();

// When we assigned a namespace to a script, now when we want to use a file in another namespace (or in the global, if no namespace is declared inside the function we want to access), we have to prepend a backslash character: \ ; and nothing else if the member of the class/class is in a global namespace 
$sclass = new \classname("Pep"); // the superClass class, as it is not in a declare namespace, it's considered to be in the global namespace; so we call it prepending a backslash (\) before the name of the class.
// new \llamable(); // The same with the interface llamable
// note that this is only put here to example the use of the namespaces, as the interfaces cannot be instanciated.

$myOrder = new orders\order(); // Note that when we wanted to use something from the orders namespace, we prefixed it with the namespace name, followed by the backslash character, followed by the name of the class we wanted to instantiate. The backslash character is known as the namespace separator.
// Spelling out the namespace like this is called using a fully qualified namespace.
?>
<?php
/**
 * The filesystem analogy is continued by way of subnamespaces. It is possible to have an entire hierarchy of namespaces, just as you would have a hierarchy of directories and files.
 */

namespace elNamespace\theSecond;

use orders\order;

function sayHello()
{
    echo 'Hello';
}
new order();
echo $myOrder;

?>