<?php
require_once __DIR__ . '/Article.php';
require_once __DIR__ . '/Db.php';

class News
{
    protected $dbConnection;

    public function __construct()
    {
        $this->dbConnection = new Db();
    }

    public function getAllArticles(): array
    {
        $sql = 'SELECT * FROM news ORDER BY id DESC';
        $result = [];
        if ($arrNews = $this->dbConnection->query($sql)) {
            foreach ($arrNews as $article) {
                $result[] = new Article($article['id'], $article['header'], $article['text'], $article['author']);
            }
        }

        return $result;
    }

    public function getArticle(int $id): ?Article
    {
        $sql = 'SELECT * FROM news WHERE id=:id';
        if ($article = $this->dbConnection->query($sql, [':id' => $id])) {
            if (!empty($article)) {
                return new Article($article[0]['id'], $article[0]['header'], $article[0]['text'], $article[0]['author']);
            }
        }

        return null;
    }
}
