<?php

require_once __DIR__ . "/generi.php";
class Movie {
    public $voti;
    public $generi;
    public $title;
    public $durata;

    function __construct($_title, $_durata, Generi $_generi){
        $this->title = $_title;
        $this->durata = $_durata;
        $this->generi = $_generi;
    }
}