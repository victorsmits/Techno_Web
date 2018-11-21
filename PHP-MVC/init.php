<?php
require_once('View/Header.php');
require_once('Model/CartModel.php');
require_once ('Model/CourseModel.php');

$FormaPHP = new Formation(
    'PHP',
    'Comprendre les bases de PHP',
    120,
    'Du 15 au 20 décembre 2018');

$FormaJAVA = new Formation(
    'JAVA',
    'Comprendre les bases de JAVA',
    150,
    'Du 15 au 20 décembre 2018');

$FormaAJAX = new Formation(
    'AJAX',
    'Comprendre les bases de AJAX',
    150,
    'Du 15 au 20 décembre 2018');
