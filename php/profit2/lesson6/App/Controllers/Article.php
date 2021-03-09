<?php

namespace App\Controllers;

use App\Controller;
use SebastianBergmann\Timer\ResourceUsageFormatter;

class Article extends Controller
{

    public function action()
    {
        $this->view->article = \App\Models\Article::findById($_GET['id']);
        $this->view->timer = (new ResourceUsageFormatter)->resourceUsage($this->timer->stop());
        $this->view->display(__DIR__ . '/../Templates/article.php');
    }

}
