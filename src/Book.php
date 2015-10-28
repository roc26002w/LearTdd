<?php


namespace No2;


class Book
{

    protected $discountBooks;
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



    /**
     * @return array
     */
    protected function discountBooks()
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