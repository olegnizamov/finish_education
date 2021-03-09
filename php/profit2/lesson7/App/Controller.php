<?php

namespace App;

use App\View\View;
use SebastianBergmann\Timer\Timer;

abstract class Controller
{

    protected View $view;
    protected Timer $timer;

    protected function access(): bool
    {
        return true;
    }

    public function __construct()
    {
        $this->view = new View();
        $this->timer= new Timer();
        $this->timer->start();
    }

    final public function __invoke()
    {
        if ($this->access()) {
            $this->action();
        } else {
            die('Ошибка доступа');
        }
    }

    abstract protected function action();

}
