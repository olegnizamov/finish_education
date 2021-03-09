<?php

namespace App\Controllers\Errors;

use App\Controller;
use SebastianBergmann\Timer\ResourceUsageFormatter;

class NotFound extends Controller
{
    protected function action()
    {
        $this->view->error = 'Ошибка 404 - не найдено';
        $this->view->timer = (new ResourceUsageFormatter)->resourceUsage($this->timer->stop());
        $this->view->display(__DIR__ . '/../../Templates/error.php');
    }
}
