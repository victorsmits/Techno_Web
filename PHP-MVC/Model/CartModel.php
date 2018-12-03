<?php
class Cart{
    private $CartArray;
    private $Cost;
    private $AmountArray;

    // constructor of a cart
    public function __construct()
    {
        //Array : key=>Value --> Key = Formation's Name
        $this->CartArray = [];
        $this->AmountArray = [];
        $this->Cost = 0;
    }
    public function __get($name)
    {
        switch ($name) {
            case 'CartArray':
                return $this->CartArray;
                break;

            case 'Cost':
                return $this->Cost;
                break;

            case 'AmountArray':
                return $this->AmountArray;
                break;

        }
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
        return $this->Cost;
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
        foreach ($this->CartArray as $elem){
            if($elem->Title == $course){
                $this->TotalCount();
            }
        }
    }
}
