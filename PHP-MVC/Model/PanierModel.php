<?php
class Cart{
    public $CartArray;
    public $Count;

    public function __construct()
    {
        $this->CartArray = array();
        $this->Count = 0;
    }

    public function AddToCart($new){
        return array_push($this->CartArray,$new);
    }

    public function TotalCount(int $price){
        return $this->Count += $price;
    }
}
