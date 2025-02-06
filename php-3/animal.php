<?php
class Animal{
    public $name;
    public $legs = 4;
    public $cold_blooded = "no";

    public function __construct($animalname) {
        $this->name = $animalname;
    }
}
?>