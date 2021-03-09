<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\Models\Article;

class Index extends Controller
{
    public function action()
    {
        $this->view->news = Article::findAll();
        $this->view->display(__DIR__ . '/../../Templates/list.php');
    }

}
