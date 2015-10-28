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
        $this->getBookDiscount();

    }

    public function getTotal()
    {
        return $this->total;
    }

    protected function getBookDiscount()
    {
        switch(count($this->books)){
            case 2:
                $this->total = $this->total * 0.95;
                break;
            case 3:
                $this->total = $this->total * 0.9;
                break;
            case 4:
                $this->total = $this->total * 0.8;
                break;
        }
    }
}