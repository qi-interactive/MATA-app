<?php

require "Money.php";

class MoneyTest extends PHPUnit_Framework_TestCase
{

    public function testAddition() {
	$this->assertEquals(4, Money::add(2, 2));
    }
}

