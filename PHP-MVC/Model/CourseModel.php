<?php
class Formation
{
    private $Title;
    private $Obj;
    private $Price;
    private $Time;

    public function __construct($title,$desc,$price,$time)
    {
       $this->Title = $title;
       $this->Obj = $desc;
       $this->Price = $price;
       $this->Time = $time;
    }

    public function __get($name)
    {
        switch ($name) {
            case 'Title':
                return $this->Title;
                break;

            case 'Obj':
                return $this->Obj;
                break;

            case 'Price':
                return $this->Price;
                break;

            case 'Time':
                return $this->Time;
                break;
        }

    }
}