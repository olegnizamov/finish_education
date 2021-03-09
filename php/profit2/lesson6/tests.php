<?php

use Tests\DbTest;
use Tests\ModelTest;

spl_autoload_register(function ($className) {
    require __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
});

DbTest::execute();
ModelTest::execute();
