<?php

namespace DiTest;

class Bootstrap {

    public static function init() {
        $loader = require '../vendor/autoload.php';

        // Add psr-0 autoloading for the assets
        $loader->add('DiAssets\\', 'assets');
    }

}

chdir(__DIR__);
\DiTest\Bootstrap::init();