<?php
class Room{
    public $Title;
    public $Largeur;
    public $Longueur;
    public $area;

    public function __construct($title,$Longeur,$Largeur)
    {
        $this->Title = $title;
        $this->Largeur = $Largeur;
        $this->Longueur = $Longeur;
        $this->area = $this->area();
    }

    public function area(){
        return $this->area = $this->Longueur * $this->Largeur;
    }
}