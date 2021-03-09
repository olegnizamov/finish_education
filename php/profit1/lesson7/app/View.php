<?php

class View
{
    protected $data = [];
    public function assign(string $name, $value): void
    {
        $this->data[$name] = $value;
    }

    public function getData(string $name)
    {
        return $this->data[$name] ?? null;
    }

    public function display(string $template): void
    {
        require_once $template;
    }

    public function render(string $template): string
    {
        ob_start();
        require_once $template;
        $result = ob_get_contents();
        ob_end_clean();

        return $result;
    }
}
