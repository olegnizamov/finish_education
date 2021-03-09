<?php

use App\Models\Article;

require __DIR__ . '/../autoload.php';
$data = Article::findAll();

include __DIR__.'/../templates/list.php';
