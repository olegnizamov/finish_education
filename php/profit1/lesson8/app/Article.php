<?php

class Article
{
    protected $id;
    protected $header;
    protected $text;
    protected $author;

    public function __construct(int $id, string $header, string $text, string $author)
    {
        $this->id = $id;
        $this->header = $header;
        $this->text = $text;
        $this->author = $author;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getHeader(): string
    {
        return $this->header;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }
}
