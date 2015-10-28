<?php


namespace No2;


class BooksDiscountCalculator
{

    protected $books;
    protected $total;

    public function addBook(Book $book)
    {
        $this->books[]    =   $book;
    }

    public function calculator()
    {
        $this->total = 0;
        foreach ($this->books as $book) {
            $this->total += $book->getPrice();
        }
        if(2 === count($this->books)){
            $this->total = $this->total * 0.95;
        }

    }

    public function getTotal()
    {
        return $this->total;
    }
}