<?php

declare(strict_types=1);

use App\Controllers\FrontController;

require __DIR__ . '/autoload.php';

$controller = new FrontController();
$controller->action();
