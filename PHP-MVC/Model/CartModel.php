<?php
class Cart{
    public $CartArray;
    public $Count;
    public $AmountArray;

    // constructor of a cart
    public function __construct()
    {
        $this->CartArray = [];
        $this->AmountArray = [];
        $this->Cost = 0;
    }
    // add new formation to a cart
    public function AddToCart($new)
    {
        // check if the formation is not already in the formation
        if (!in_array($new, $this->CartArray)) {
            array_push($this->CartArray, $new);
        }
        $this->AmountArray[$new->Title] += 1;
        $this->TotalCount($new);
    }
    // count the total cost of a cart
    public function TotalCount($new){
        $price = $new->Price;
        return $this->Cost += $price;
    }

    public function DelFormation($course){
        $this->AmountArray[$course] -= 1;

        for ($i=0; $i<count($this->CartArray); $i++) {
            $elem = $this->CartArray[$i];
            if($elem->Title == $course){
                $price = $elem->Price;
                return $this->Cost -= $price;
            }
        }
    }

    public function AddAmount($course,$Amount){
        $this->AmountArray[$course] += $Amount;

        for ($i=0; $i<count($this->CartArray); $i++) {
            $elem = $this->CartArray[$i];
            if($elem->Title == $course){
                $price = $elem->Price;
                return $this->Cost += $price * $Amount;
            }
        }
    }
}
