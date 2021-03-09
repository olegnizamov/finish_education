<?php

namespace App\Controllers;

use App\Controller;
use App\Exceptions\NotFoundException;

class Article extends Controller
{

    public function action()
    {
        $this->view->article = \App\Models\Article::findById($_GET['id']);
        if (empty( $this->view->article)) {
            throw new NotFoundException('Ошибка 404 - не найдено');
        }
        $this->view->display(__DIR__ . '/../Templates/article.php');
    }

}
