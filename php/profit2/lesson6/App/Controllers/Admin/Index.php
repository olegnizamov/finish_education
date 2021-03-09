<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\Models\Article;
use SebastianBergmann\Timer\ResourceUsageFormatter;

class Index extends Controller
{
    public function action()
    {
        $this->view->news = Article::findAll();
        $this->view->timer = (new ResourceUsageFormatter)->resourceUsage($this->timer->stop());
        $this->view->display(__DIR__ . '/../../Templates/list.php');
    }

}
