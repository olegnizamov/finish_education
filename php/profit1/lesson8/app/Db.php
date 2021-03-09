<?php

class Db
{
    protected $dbh;
    protected $sth;

    public function __construct()
    {
        require_once __DIR__ . '/../config.php';
        $this->dbh = new \PDO(
            'mysql:host=' . $dbConnection['db']['host'] . ';dbname=' . $dbConnection['db']['dbname'],
            $dbConnection['db']['username'],
            $dbConnection['db']['password']
        );
    }

    public function query(string $sql, array $params = [])
    {
        if (!$this->execute($sql, $params)) {
            return false;
        }

        return $this->sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function execute(string $sql, array $params = []): bool
    {
        $this->sth = $this->dbh->prepare($sql);
        return $this->sth->execute($params);
    }
}
