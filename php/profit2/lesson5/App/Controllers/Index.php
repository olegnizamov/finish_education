<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article as Article;

class Index extends Controller
{

    public function action()
    {
        $this->view->news = Article::findAll();
        $this->view->display(__DIR__ . '/../Templates/index.php');
    }
}
