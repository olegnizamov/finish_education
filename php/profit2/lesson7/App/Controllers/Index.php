<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article as Article;
use SebastianBergmann\Timer\ResourceUsageFormatter;

class Index extends Controller
{

    public function action()
    {
        $this->view->news = Article::findAll();
        $this->view->resourceUsageFormatter = new ResourceUsageFormatter();
        $this->view->timer = $this->timer;
        $this->view->display(__DIR__ . '/../Templates/index.php');
    }
}
