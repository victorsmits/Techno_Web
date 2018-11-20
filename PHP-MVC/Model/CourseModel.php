<?php
class Formation
{
    public $Title;
    public $Obj;
    public $Price;
    public $Time;

    public function __construct($title,$desc,$price,$time)
    {
       $this->Title = $title;
       $this->Obj = $desc;
       $this->Price = $price;
       $this->Time = $time;
    }
}