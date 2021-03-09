<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\Exceptions\NotFoundException;
use App\Models\Article;

class Save extends Controller
{
    public function action()
    {
        if (!empty($_POST)) {
            if (isset($_POST['id'])) {
                $article = Article::findById($_POST['id']);
                if (empty($article)) {
                    throw new NotFoundException('Ошибка 404 - не найдено');
                }
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

