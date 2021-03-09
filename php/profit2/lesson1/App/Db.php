<?php

namespace App;

class Db
{

    protected \PDO $dbh;

    public function __construct()
    {
        $this->dbh = new \PDO('mysql:host=mysql:3306;dbname=profit2', 'root', '');
    }

    public function query(string $sql, array $params = [], string $class = null): ?array
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);

        if (null === $class) {
            $data = $sth->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $data = $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }

        return $data;
    }

    public function execute(string $sql, array $params = []): bool
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }
}
