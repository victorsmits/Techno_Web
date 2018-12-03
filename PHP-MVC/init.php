<?php
class init{
    private $FormaPHP;
    private $FormaJAVA;
    private $FormaAJAX;

    public function __construct()
    {
        $this->FormaPHP = new Formation(
            'PHP',
            'Comprendre les bases de PHP',
            120,
            'Du 15 au 20 décembre 2018');
        $this->FormaJAVA = new Formation(
            'JAVA',
            'Comprendre les bases de JAVA',
            150,
            'Du 15 au 20 décembre 2018');
        $this->FormaAJAX = new Formation(
            'AJAX',
            'Comprendre les bases de AJAX',
            150,
            'Du 15 au 20 décembre 2018');
    }

    public function __get($Forma)
    {
        if($Forma == 'FormaPHP') {
            return $this->FormaPHP;
        }
        if($Forma == 'FormaJAVA') {
            return $this->FormaJAVA;
        }
        if($Forma == 'FormaAJAX') {
            return $this->FormaAJAX;
        }
    }
}