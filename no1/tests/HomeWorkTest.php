<?php


/**
 * Created by PhpStorm.
 * User: Rocko
 * Date: 15/10/22
 * Time: 上午11:55
 */
class HomeWorkTest extends PHPUnit_Framework_TestCase
{

    protected $product;
    protected $anyCollection;


    public function setUp()
    {
        $this->product = [
          ['cost' => 1, 'revenue'=>11 , 'sellPrice' => 21],
          ['cost' => 2, 'revenue'=>12 , 'sellPrice' => 22],
          ['cost' => 3, 'revenue'=>13 , 'sellPrice' => 23],
          ['cost' => 4, 'revenue'=>14 , 'sellPrice' => 24],
          ['cost' => 5, 'revenue'=>15 , 'sellPrice' => 25],
          ['cost' => 6, 'revenue'=>16 , 'sellPrice' => 26],
          ['cost' => 7, 'revenue'=>17 , 'sellPrice' => 27],
          ['cost' => 8, 'revenue'=>18 , 'sellPrice' => 28],
          ['cost' => 9, 'revenue'=>19 , 'sellPrice' => 29],
          ['cost' => 10, 'revenue'=>20 , 'sellPrice' => 30],
          ['cost' => 11, 'revenue'=>21 , 'sellPrice' => 31],
        ];

        $this->anyCollection = $this->getMockBuilder('AnyCollection')->getMock();
    }

    /**
     * @group Test
     */
    public function test_cost_sum()
    {

        //Arrange
        $expect = [6, 15, 24, 21];

        //Act
        $cost =  $this->anyCollection;
        $cost->method('getPropertySumGroup')->willReturn($expect);

        $act  = $cost->getPropertySumGroup($this->product,'cost',3);

        //Assert
        $this->assertEquals($expect, $act);
    }

    /**
     * @group Test
     */
    public function test_revenue_sum()
    {

        //Arrange
        $expect = [50, 66, 60];

        //Act
        $cost =  $this->anyCollection;
        $cost->method('getPropertySumGroup')->willReturn($expect);

        $act  = $cost->getPropertySumGroup($this->product,'revenue',4);

        //Assert
        $this->assertEquals($expect, $act);
    }


    public function tearDown()
    {
        $this->product = null;
    }
}


class AnyCollection
{

    public function getPropertySumGroup($product,$group,$sumNum)
    {

    }
}

