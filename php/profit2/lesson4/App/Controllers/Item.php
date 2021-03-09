<?php

namespace App\Controllers;

use App\Controller;

class Item extends Controller
{

    public function action()
    {
        $this->view->product = \App\Models\Product::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../Templates/item.php');
    }

}
