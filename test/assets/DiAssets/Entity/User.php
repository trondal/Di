<?php

namespace DiAssets\Entity;

class User {

    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

}