<?php


namespace No2;


class Book
{

    protected $shippingBooks;
    protected $price;
    private $name;
    private $count;

    /**
     * Book constructor.
     * @param $name
     * @param $count
     */
    public function __construct($name,$count)
    {
        $this->name  = $name;
        $this->count = $count;
    }

    public function getPrice()
    {
        $this->price    =   0;
        $shippingBooks = $this->ShippingBooks();
        if(array_key_exists($this->name,$shippingBooks)){
            $this->price = $shippingBooks[$this->name];
        }

        return $this->price;
    }

    public function getTitle()
    {

        return $this->name;
    }

    public function getCount()
    {

        return $this->count;
    }


    /**
     * @return array
     */
    protected function ShippingBooks()
    {
        return [
            'Harry Potter1' => 100,
            'Harry Potter2' => 100,
            'Harry Potter3' => 100,
            'Harry Potter4' => 100,
            'Harry Potter5' => 100,
        ];
    }
}