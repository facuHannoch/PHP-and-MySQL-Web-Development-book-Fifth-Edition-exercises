<?php

namespace orders;

class order
{
    public static $noOrder = 0;
    function __toString()
    {
        return '<br/> I am the no ' . order::$noOrder . ' order <br/>';
    }
    function __construct()
    {
        order::$noOrder++;
    }
}
class orderItem
{
}
