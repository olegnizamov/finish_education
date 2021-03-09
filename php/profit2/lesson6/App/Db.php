<?php

namespace App;

use App\Exceptions\SqlException;
use PDO;

class Db
{

    protected PDO $dbh;

    public function __construct()
    {
        $config = Config::getConfig();
        $this->dbh = new PDO(
            'mysql:host=' . $config->data['db']['host'] . ';dbname=' . $config->data['db']['dbname'],
            $config->data['db']['username'],
            $config->data['db']['password']
        );
    }

    public function query(string $sql, array $params = [], string $class = null): ?array
    {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($params);
        if (false === $result) {
            throw new SqlException('Неверный запрос sql: ' . $sql);
        }

        if (null === $class) {
            $data = $sth->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $data = $sth->fetchAll(PDO::FETCH_CLASS, $class);
        }

        return $data;
    }

    public function execute(string $sql, array $params = []): bool
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}
