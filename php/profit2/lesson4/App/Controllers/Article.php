<?php

namespace App\Controllers;

use App\Controller;

class Article extends Controller
{

    public function action()
    {
        $this->view->article = \App\Models\Article::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../Templates/article.php');
    }

}
