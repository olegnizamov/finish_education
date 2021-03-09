<?php

include_once __DIR__ . '/TextFile.php';

class GuestBook extends TextFile
{
    public function append(string $text): GuestBook
    {
        $this->data[] = $text;

        return $this;
    }
}
