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
         $this->CartArray[$new->Title]= $new;
         $this->AmountArray[$new->Title] = 0;
        }
        $this->AmountArray[$new->Title] += 1;
        $this->TotalCount();
    }
    // count the total cost of a cart
    public function TotalCount(){
        $this->Cost =0 ;
        foreach ($this->CartArray as $elem){
            $price = $elem->Price;
            $Amount = $this->AmountArray[$elem->Title];
            $this->Cost += $price * $Amount ;
        }
    }

    public function DelFormation($course){
        if(array_key_exists($course,$this->CartArray) & array_key_exists($course,$this->AmountArray) ){
            $elem = $this->CartArray[$course];
            $price = $elem->Price;
            $this->Cost -= $price * $this->AmountArray[$course];
            unset($this->AmountArray[$course]);
            unset($this->CartArray[$course]);
        }
    }

    public function ChangeQty($course,$Amount){
        if($Amount == 0){
            $this->DelFormation($course);
        }
        $this->AmountArray[$course] = $Amount;
        for ($i=0; $i<count($this->CartArray); $i++) {
            $elem = $this->CartArray[$i];
            if($elem->Title == $course){
                $this->TotalCount();
            }
        }
    }
}
