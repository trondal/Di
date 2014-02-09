<?php

namespace DiAssets\Db;

class DataBase {

    protected $options;

    public function __construct($dbname, $username, $password) {
        $this->options['dbname'] = $dbname;
        $this->options['username'] = $username;
        $this->options['password'] = $password;
    }

    /**
     *
     * @return \PDO;
     */
    public function getOption($key) {
        return $this->options[$key];
    }

    public function getOptions() {
        return $this->options;
    }

}
