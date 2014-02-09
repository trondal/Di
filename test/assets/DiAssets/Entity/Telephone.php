<?php

namespace DiAssets\Entity;

class Telephone {

    private $number;

    public function setPhone($number) {
        $this->number = $number;
    }

    public function getPhone(){
        return $this->number;
    }

}
