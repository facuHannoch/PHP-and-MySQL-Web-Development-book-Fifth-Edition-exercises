<?php
class myClass
{
    public $a = "5";
    public $b = "7";
    public $c = "9";
}
$x = new myClass;
foreach ($x as $attribute) { // You can use a foreach() loop to iterate through the attributes of an object as you would an array.
    echo $attribute . "<br />";
}


/** 
  If you need more sophisticated behavior than this, you can implement an iterator. To do this, you make the class that you want to iterate over implement the IteratorAggregate interface and give it a method called getIterator that returns an instance of the iterator class. That class must implement the Iterator interface, which has a series of methods that must be implemented.
 */
class ObjectIterator implements Iterator
{
    private $obj;
    private $count;
    private $currentIndex;
    function __construct($obj)
    {
        $this->obj = $obj;
        $this->count = count($this->obj->data);
    }
    function rewind()
    {
        $this->currentIndex = 0;
    }
    function valid()
    {
        return $this->currentIndex < $this->count;
    }
    function key()
    {
        return $this->currentIndex;
    }
    function current()
    {
        return $this->obj->data[$this->currentIndex];
    }
    function next()
    {
        $this->currentIndex++;
    }
}

class OneObject implements IteratorAggregate
{
    public $data = array();
    function __construct($in)
    {
        $this->data = $in;
    }
    function getIterator()
    {
        return new ObjectIterator($this);
    }
}

$myObject = new OneObject(array(2, 4, 6, 8, 10));

$myIterator = $myObject->getIterator();

for ($myIterator->rewind(); $myIterator->valid(); $myIterator->next()) {
    $key = $myIterator->key();
    $value = $myIterator->current();
    echo $key . " => " . $value . "<br />";
}

/**
 * 
 * The ObjectIterator class has a set of functions as required by the Iterator interface:
 * 
 * 
 * The constructor is not required but is obviously a good place to set up values for the number of items you plan to iterate over and a link to the current data item.
 * 
 *  The rewind() function should set the internal data pointer back to the beginning of the data.
 * 
 * The valid() function should tell you whether more data still exists at the current location of the data pointer.
 * 
 * The key() function should return the value of the data pointer.
 * 
 * The value() function should return the value stored at the current data pointer.
 * 
 * The next() function should move the data pointer along in the data.
 * 
 * The reason for using an iterator class like this is that the interface to the data will not change even if the underlying implementation changes. In this example, the IteratorAggregate class is a simple array. If you decide to change it to a hash table or linked list, you could still use a standard Iterator to traverse it, although the Iterator code would change.
 * 
 */
