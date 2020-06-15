<?php
// PHP’s object-oriented features also include the reflection API. Reflection is the ability to interrogate existing classes and objects to find out about their structure and contents. This capability can be useful when you are interfacing to unknown or undocumented classes, such as when interfacing with encoded PHP scripts.
require_once("page/page.php");
$class = new ReflectionClass("Page");
echo '<pre>' . $class . '</pre>'; // Here, you use the __toString() method of the Reflection class to print out this data. Note that the <pre> tags are on separate lines so as not to confuse the __toString() method.
