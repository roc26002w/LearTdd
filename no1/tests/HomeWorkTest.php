<?php
use No1\lib\sourceCollection;

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

class AnyCollection extends sourceCollection
{

    public function cost()
    {

        return $this->getReslut('cost',3);
    }

    public function revenue()
    {
        return $this->getReslut('revenue',4);
    }

    private function getResource()
    {
        $resource = [
            "cost" => [1,2,3,4,5,6,7,8,9,10,11],
            "revenue" => [11,12,13,14,15,16,17,18,19,20,21],
            "sellprice" => [21,22,23,24,25,26,27,28,29,30,31],
        ];

        return $resource;
    }


    private function getReslut($option,$sumNum)
    {
        $resultData     =   [];
        $resource   =   $this->getResource();
        if(is_array($resource)){
            $catResource = array_chunk($resource[$option], $sumNum);
            foreach($catResource as $key => $value){

                    array_push($resultData,array_sum($value));
            }
        }
        return $resultData;
    }
}

