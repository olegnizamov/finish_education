<?php

namespace Tests;

use App\Db;

class DbTest
{
    public static function execute()
    {
        self::testQuerySuccess();
        self::testQueryFail();
        self::testExecuteSuccess();
        self::testExecuteFail();
    }

    public static function testQuerySuccess(): void
    {
        $db = new Db();
        $sql = 'SELECT * FROM news';
        $result = $db->query($sql, []);
        assert(is_array($result));
    }

    public static function testQueryFail(): void
    {
        $db = new Db();
        $sql = 'SELECT * FROM news231';
        $result = $db->query($sql, []);
        assert(null === $result);
    }

    public static function testExecuteSuccess(): void
    {
        $db = new Db();
        $sql = 'SELECT * FROM news';
        $result = $db->execute($sql, []);
        assert(true === $result);
    }

    public static function testExecuteFail(): void
    {
        $db = new Db();
        $sql = 'SELECT * FROM news11';
        $result = $db->execute($sql, []);
        assert(false === $result);
    }
}
