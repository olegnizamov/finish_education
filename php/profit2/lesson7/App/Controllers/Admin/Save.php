<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\Models\Article;

class Save extends Controller
{
    public function action()
    {
        if (!empty($_POST)) {
            if (isset($_POST['id'])) {
                $article = Article::findById($_POST['id']);
            } else {
                $article = new Article();
            }
            $article->title = $_POST['title'] ?? '';
            $article->contents = $_POST['contents'] ?? '';
            $article->save();
        }
        header('Location: /ADMIN/INDEX');
        exit;
    }

}

