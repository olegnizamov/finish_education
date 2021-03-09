<?php

use Tests\DbTest;

spl_autoload_register(function ($className) {
    require __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
});

DbTest::execute();
