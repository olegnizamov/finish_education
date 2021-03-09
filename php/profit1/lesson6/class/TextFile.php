<?php

class TextFile
{
    protected $path;
    protected $data;

    public function __construct(string $path)
    {
        $this->path = $path;

        if (file_exists($path)) {
            $this->data = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        }
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function save()
    {
        file_put_contents($this->path, implode(PHP_EOL, $this->data));
    }
}
