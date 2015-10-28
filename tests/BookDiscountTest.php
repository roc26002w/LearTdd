<?php
use No2\BooksDiscountCalculator;
use No2\Book;

class BooksDiscountTest extends PHPUnit_Framework_TestCase
{

    protected $booksDiscountCalculator;


    protected function setUp()
    {

        $this->booksDiscountCalculator    =   new BooksDiscountCalculator();
    }

    /**
     *一到五集的哈利波特，每一本都是賣100元
     *價格應為100*1=100元
     */
    public function test_Buy_One_Book()
    {
        //Arrange
        $except = 100;
        $test = new Book('Harry Potter1',1);
        //Act
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter1',100));
        $this->booksDiscountCalculator->calculator();
        $act    =   $this->booksDiscountCalculator->getTotal();

        //Assert
        $this->assertEquals($except,$act);

    }

    /**
     *一到五集的哈利波特，每一本都是賣100元
     *價格應為100*1=100元
     */

}
