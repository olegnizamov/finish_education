<?php

namespace App\View;

class View implements \Countable, \Iterator
{
    use ViewTrait;

    protected array $data = [];

    public function add($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function render($template)
    {
        ob_start();
        include $template;
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;
    }

    public function display($template)
    {
        include $template;
    }

    public function count()
    {
        return count($this->data);
    }

    public function current()
    {
        return current($this->data);
    }

    public function next()
    {
        next($this->data);
    }

    public function key()
    {
        return key($this->data);
    }

    public function valid()
    {
        return null !== key($this->data);
    }

    public function rewind()
    {
        reset($this->data);
    }
}
