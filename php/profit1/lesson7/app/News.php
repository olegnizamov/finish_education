<?php
require_once __DIR__ . '/Article.php';

class News
{
    protected $articles = [];

    public function __construct()
    {
        $this->path = __DIR__ . '/../articles.txt';
        $this->articles = $this->loadAllArticles();
    }

    public function loadAllArticles(): array
    {
        $result = [];
        if (file_exists($this->path)) {
            $lines = file($this->path, FILE_IGNORE_NEW_LINES);
            foreach ($lines as $line) {
                [$id, $title, $description, $detailText] = explode('|', $line);
                $result[$id] = new Article($id, $title, $description, $detailText);
            }
        }

        return $result;
    }

    public function getAllArticles(): array
    {
        return $this->articles;
    }

    public function getArticle(int $id): ?Article
    {
        if (array_key_exists($id, $this->articles)) {
            return $this->articles[$id];
        }

        return null;
    }
}
