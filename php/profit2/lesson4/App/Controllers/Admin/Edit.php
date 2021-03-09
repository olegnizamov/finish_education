<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\Models\Article;

class Edit extends Controller
{
    public function action()
    {
        if (isset($_GET['id'])) {
            $article = Article::findById($_GET['id']);
            if (!empty($article)) {
                $this->view->article = $article;
                $this->view->display(__DIR__ . '/../../Templates/edit.php');
            }
        } else {
            $this->view->display(__DIR__ . '/../../Templates/add.php');
        }
    }

}

