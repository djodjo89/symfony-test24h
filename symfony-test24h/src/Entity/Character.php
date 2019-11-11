<?php
namespace App\Entity;


class Character {
    private $id;
    private $first_name;
    private $age;
    private $type;
    function __construct($id) {
        $this->id = $id;
        $NAMES = ['Okita', 'Machin', 'Bidule'];
        $this->first_name = $NAMES[rand(0, 2)];
        if (0 === $this->id % 2) {
            $this->type = 'normal.e';
            $this->age = rand(1, 100);
        }
        else if (1 === $this->id % 2) {
            $this->type = 'participant.e aux 24h';
            $this->age = rand(1, 1000);
        }
    }
    public function getFirstName() {
        return $this->first_name;
    }
    public function getAge() {
        return $this->age;
    }
    public function getType() {
        return $this->type;
    }
}