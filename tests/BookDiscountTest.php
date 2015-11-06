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
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter1',1));
        $expected = 100;

        //Act
        $this->booksDiscountCalculator->calculator();
        $act    =   $this->booksDiscountCalculator->getTotal();

        //Assert
        $this->assertEquals($expected,$act);

    }

    /**
     *第一集買了一本，第二集也買了一本，價格應為100*2*0.95=190元
     */
    public function test_Buy_Two_Book_Get_190()
    {
        //Arrange
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter1',1));
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter2',1));

        $expected = 190;

        //Act
        $this->booksDiscountCalculator->calculator();
        $act    =   $this->booksDiscountCalculator->getTotal();

        //Assert
        $this->assertEquals($expected,$act);


    }

    /**
     *一二三集各買了一本，價格應為100*3*0.9=270
     */
    public function test_Buy_Three_Book_Get_270()
    {

        //Arrange
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter1',1));
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter2',1));
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter3',1));
        $expected = 270;

        //Act
        $this->booksDiscountCalculator->calculator();
        $act    =   $this->booksDiscountCalculator->getTotal();

        //Assert
        $this->assertEquals($expected,$act);
    }

    /**
     *一二三四集各買了一本，價格應為100*4*0.8=320
     */
    public function test_Buy_Four_Book_Get_320()
    {
        //Arrange
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter1',1));
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter2',1));
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter3',1));
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter4',1));
        $expected = 320;

        //Act
        $this->booksDiscountCalculator->calculator();
        $act    =   $this->booksDiscountCalculator->getTotal();

        //Assert
        $this->assertEquals($expected,$act);

    }

    /**
     *一次買了整套，一二三四五集各買了一本，價格應為100*5*0.75=375
     */
    public function test_Buy_All_Potter_BookGet_375()
    {
        //Arrange
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter1',1));
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter2',1));
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter3',1));
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter4',1));
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter5',1));
        $expected = 375;

        //Act
        $this->booksDiscountCalculator->calculator();
        $act    =   $this->booksDiscountCalculator->getTotal();

        //Assert
        $this->assertEquals($expected,$act);
        
    }

    /**
     *一二集各買了一本，第三集買了兩本，價格應為100*3*0.9 + 100 = 370
     */
    public function test_Buy_v1Book_one_v2Book_one_v3Book_three_Get_370()
    {
        //Arrange
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter1',1));
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter2',1));
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter3',2));
        $expected = 370;

        //Act
        $this->booksDiscountCalculator->calculator();
        $act    =   $this->booksDiscountCalculator->getTotal();

        //Assert
        $this->assertEquals($expected,$act);

    }

    /**
     *第一集買了一本，第二三集各買了兩本，價格應為100*3*0.9 + 100*2*0.95 = 460
     */
    public function test_Buy_v1Book_one_v2Book_two_v3Book_two_Get_460()
    {
        //Arrange
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter1',1));
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter2',2));
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter3',2));
        $expected = 460;

        //Act
        $this->booksDiscountCalculator->calculator();
        $act    =   $this->booksDiscountCalculator->getTotal();

        //Assert
        $this->assertEquals($expected,$act);

    }

    /**
     * 加碼
     * 第一集買了1本，第二三集各買了3本，第45集各買1本，價格應為100*5*0.75 + 100*2*0.95 + 100*2*0.95 = 755
     */
    public function test_Buy_v1Book_one_v2Book_three_v3Book_three_v4Book_one_v5Book_one_Get_460()
    {
        //Arrange
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter1',1));
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter2',3));
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter3',3));
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter4',1));
        $this->booksDiscountCalculator->addBook(new Book('Harry Potter5',1));
        $expected = 755;

        //Act
        $this->booksDiscountCalculator->calculator();
        $act    =   $this->booksDiscountCalculator->getTotal();

        //Assert
        $this->assertEquals($expected,$act);

    }

}
