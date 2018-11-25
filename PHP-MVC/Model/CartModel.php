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
        $this->TotalCount();
    }
    // count the total cost of a cart
    public function TotalCount(){
        $this->Cost =0 ;
        for ($i=0; $i<count($this->CartArray); $i++) {
            $elem = $this->CartArray[$i];
            $price = $elem->Price;
            $Amount = $this->AmountArray[$elem->Title];
            $this->Cost += $price * $Amount ;
        }
    }

    public function DelFormation($course){
        for ($i=0; $i<count($this->CartArray); $i++) {
            $elem = $this->CartArray[$i];
            if($elem->Title == $course){
                $price = $elem->Price;
                $this->Cost -= $price * $this->AmountArray[$elem->Title];
                array_diff($this->AmountArray,$this->AmountArray[$elem->Title]= null);
                array_diff($this->CartArray,$this->CartArray[$elem]= null);
            }
        }
    }

    public function AddAmount($course,$Amount){
        $this->AmountArray[$course] = $Amount;
        for ($i=0; $i<count($this->CartArray); $i++) {
            $elem = $this->CartArray[$i];
            if($elem->Title == $course){
                $this->TotalCount();
            }
        }
    }
}
