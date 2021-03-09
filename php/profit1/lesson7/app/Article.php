<?php

class Article
{
    protected int $id;
    protected string $title;
    protected string $description;
    protected string $detailText;

    public function __construct(int $id, string $title, string $description, string $detailText)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->detailText = $detailText;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getDetailText(): string
    {
        return $this->detailText;
    }
}
