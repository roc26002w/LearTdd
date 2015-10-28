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
     *買一本價格應為100*1=100元
     */
    public function test_Buy_One_Book_Get_100()
    {
        //Arrange
        $except = 100;
        //Act
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter1',1));
        $this->booksDiscountCalculator->calculator();
        $act    =   $this->booksDiscountCalculator->getTotal();

        //Assert
        $this->assertEquals($except,$act);

    }

    /**
     *第一集買了一本，第二集也買了一本，價格應為100*2*0.95=190元
     */
    public function test_Buy_Two_Book_Get_190()
    {
        //Arrange
        $except = 190;

        //Act
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter1',1));
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter2',1));
        $this->booksDiscountCalculator->calculator();
        $act    =   $this->booksDiscountCalculator->getTotal();

        //Assert
        $this->assertEquals($except,$act);


    }

    /**
     *一二三集各買了一本，價格應為100*3*0.9=270
     */
    public function test_Buy_Three_Book_Get_270()
    {

        //Arrange
        $except = 270;

        //Act
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter1',1));
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter2',1));
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter3',1));
        $this->booksDiscountCalculator->calculator();
        $act    =   $this->booksDiscountCalculator->getTotal();

        //Assert
        $this->assertEquals($except,$act);
    }

    /**
     *一二三四集各買了一本，價格應為100*4*0.8=320
     */
    public function test_Buy_Four_Book_Get_320()
    {
        //Arrange
        $except = 320;

        //Act
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter1',1));
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter2',1));
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter3',1));
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter4',1));
        $this->booksDiscountCalculator->calculator();
        $act    =   $this->booksDiscountCalculator->getTotal();

        //Assert
        $this->assertEquals($except,$act);

    }

}
