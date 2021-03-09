<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\Models\Article;

class Delete extends Controller
{
    public function action()
    {
        if (isset($_GET['id'])) {
            $article = Article::findById($_GET['id']);
            if (!empty($article)) {
                $article->delete();
            }
        }

        header('Location: /ADMIN/INDEX');
        exit;
    }

}

