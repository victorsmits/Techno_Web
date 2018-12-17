<?php
class House{
    public $RoomsArray;
    public $HouseArea;

    public function __construct()
    {
        $this->RoomsArray = [];
        $this->HouseArea = 0;
    }

    public function AddRoom($Room){
        if (!in_array($Room, $this->RoomsArray)) {
            $this->RoomsArray[$Room->Title]= $Room;
            $this->HouseArea += $Room->area;
        }
    }
}