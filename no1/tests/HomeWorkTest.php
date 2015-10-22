<?php

/**
 * Created by PhpStorm.
 * User: Rocko
 * Date: 15/10/22
 * Time: 上午11:55
 */
class HomeWorkTest extends PHPUnit_Framework_TestCase
{

    /**
     * @group Test
     */
    public function test_cost_sum()
    {

        //Arrange
        $expect = [6, 15, 24, 21];

        //Act
        $cost = new AnyCollection();
        $act  = $cost->cost();

        //Assert
        $this->assertEquals($expect, $act);
    }


    public function test_revenue_sum()
    {

        //Arrange
        $expect = [50,66,60];

        //Act
        $cost = new AnyCollection();
        $act  = $cost->revenue();

        //Assert
        $this->assertEquals($expect, $act);
    }
}

class AnyCollection
{

    public function cost()
    {

        return [6, 15, 24, 21];
    }

    public function revenue()
    {
        return [50,66,60];
    }
}

