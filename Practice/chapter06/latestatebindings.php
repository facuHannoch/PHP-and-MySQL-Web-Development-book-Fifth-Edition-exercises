<?php
class A
{
    public static function whichclass()
    {
        echo __CLASS__;
    }
    public static function test()
    {
        // self::whichclass();
        static::whichclass();
    }
}
class B extends A
{
    public static function whichclass()
    {
        echo __CLASS__;
    }
}
// the code outputs A, twice. This is because, although B overrides the whichclass() method, when the test() method is called by B, it is executed in the context of the parent class, A.
A::test();
B::test();
/**
 * To use the implementation inside the class we are actually using we have to make use of late static bindings.
 * changing this line of code:
  self::whichclass();
 * for this:
  static::whichclass();
 * 
  The static modifier here makes PHP use the class that was actually called at runtime, hence the “late” part of the name.
 * 
 */
// 