<?php

namespace App\Controllers\Errors;

use App\Controller;

class NotFoundController extends Controller
{
    protected function action()
    {
        $this->view->error = 'Ошибка 404 - не найдено';
        $this->view->display(__DIR__ . '/../../Templates/error.php');
    }
}
