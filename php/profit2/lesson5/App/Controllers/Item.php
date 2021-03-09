<?php

namespace App\Controllers;

use App\Controller;
use App\Exceptions\NotFoundException;

class Item extends Controller
{

    public function action()
    {
        $this->view->product = \App\Models\Product::findById($_GET['id']);
        if (empty($this->view->product)) {
            throw new NotFoundException('Ошибка 404 - не найдено');
        }

        $this->view->display(__DIR__ . '/../Templates/item.php');
    }

}
