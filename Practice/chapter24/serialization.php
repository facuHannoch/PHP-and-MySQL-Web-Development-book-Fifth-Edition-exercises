<?php

/**
 * Serialization is the process of turning anything you can store in a PHP variable or object into a bytestream that can be stored in a database or passed along via a URL from page to page. Without this process, it is difficult to store or pass the entire contents of an array or object.
 * 
 * Serialization has decreased in usefulness since the introduction of session control. Serializing data is principally used for the types of things you would now use session control for. In fact, the session control functions serialize session variables to store them between HTTP requests.
 * 
 * However, you might still want to store a PHP array or object in a file or database. If you do, you need to know how to use these two functions: serialize() and unserialize().
 */

// $serial_object = serialize($my_object);

class employee
{
    var $name;
    var $employee_id;
    function __toString(){
        return "name: $this->name, employee_id: $this->employee_id";
    }
}

$this_emp = new employee();
$this_emp->name = 'Fred';
$this_emp->employee_id = 5324;
echo $this_emp;
echo '<br/>';

$this_emp_serialized = serialize($this_emp);
echo 'serialized: '.$this_emp_serialized;
echo '<br/>';

$this_emp_unserialized = unserialize($this_emp_serialized);
echo 'unserialized: '.$this_emp_unserialized;
