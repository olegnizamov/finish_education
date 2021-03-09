<?php

namespace App;

use App\View\View;

abstract class Controller
{

    protected View $view;

    protected function access(): bool
    {
        return true;
    }

    public function __construct()
    {
        $this->view = new View();
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
