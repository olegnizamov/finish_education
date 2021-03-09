<?php

use App\Models\Article;
require __DIR__ . '/autoload.php';
$data = Article::getLastRecords(3);

include __DIR__.'/templates/news.php';
