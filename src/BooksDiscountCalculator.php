<?php


namespace No2;


class BooksDiscountCalculator
{

    protected $books;
    protected $total;
    protected $bookCount;
    protected $unBooks;
    protected $totalList;

    public function addBook(Book $book)
    {
        $this->books[]    =   $book;
    }

    public function calculator()
    {
        $this->total = 0;
        foreach ($this->books as $book) {
            $bookCount = $book->getCount();
            for($i = 0;$i < $bookCount ; $i++){
                
                if(!isset($this->unBooks[$i])){
                    $this->unBooks[$i] = [];
                }
                if(!isset($this->totalList[$i])){
                    $this->totalList[$i] = 0;
                }
                
                if(!in_array($book->getTitle(),$this->unBooks[$i])){
                    $this->unBooks[$i][]    =   $book->getTitle();
                }
                $this->totalList[$i] += $book->getPrice();
            }
        }
        
        $this->getBookDiscount();

    }

    public function getTotal()
    {
        return $this->total;
    }

    protected function getBookDiscount()
    {

        foreach ($this->unBooks as $key => $groupBook)
        {
            $groupCount = count($this->unBooks[$key]);
            $this->total += $this->totalList[$key] * $this->getDiscountValue($groupCount);
        }

    }

    protected function getDiscountValue($groupCount)
    {

        switch ($groupCount)
        {
            case 2:
                return 0.95;
                break;
            case 3:
                return 0.9;
                break;
            case 4:
                return 0.8;
                break;
            case 5:
                return 0.75;
                break;
            default:
                return 1;
                break;
        }
    }
}