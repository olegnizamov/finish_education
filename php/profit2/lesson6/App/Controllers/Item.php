<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Product;
use SebastianBergmann\Timer\ResourceUsageFormatter;

class Item extends Controller
{

    public function action()
    {
        $this->view->product = Product::findById($_GET['id']);
        $this->view->timer = (new ResourceUsageFormatter)->resourceUsage($this->timer->stop());
        $this->view->display(__DIR__ . '/../Templates/item.php');
    }

}
