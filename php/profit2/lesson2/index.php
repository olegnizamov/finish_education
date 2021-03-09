<?php

declare(strict_types=1);

use App\Models\Article;
require __DIR__ . '/autoload.php';
$data = Article::getLastRecords(5);

include __DIR__.'/templates/news.php';
