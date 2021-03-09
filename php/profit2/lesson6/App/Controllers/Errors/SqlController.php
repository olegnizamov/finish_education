<?php

namespace App\Controllers\Errors;

use App\Controller;
use SebastianBergmann\Timer\ResourceUsageFormatter;

class SqlController extends Controller
{
    protected function action()
    {
        $this->view->error = 'Неправильный sql запрос';
        $this->view->timer = (new ResourceUsageFormatter)->resourceUsage($this->timer->stop());
        $this->view->display(__DIR__ . '/../../Templates/error.php');
    }
}
