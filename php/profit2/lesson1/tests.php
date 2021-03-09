<?php

use Tests\DbTest;

function __autoload($className)
{
    require __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
}

DbTest::execute();
