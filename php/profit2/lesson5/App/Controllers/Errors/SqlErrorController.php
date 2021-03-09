<?php

namespace App\Controllers\Errors;

use App\Controller;

class SqlErrorController extends Controller
{
    protected function action()
    {
        $this->view->error = 'Неправильный sql запрос';
        $this->view->display(__DIR__ . '/../../Templates/error.php');
    }
}
