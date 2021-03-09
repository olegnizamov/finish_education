<?php

namespace App;

abstract class Model
{

    protected const TABLE = '';

    public int $id;

    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE;

        return $db->query($sql, [], static::class);
    }

    public static function findById(int $id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $result = $db->query($sql, [':id' => $id], static::class);
        if (empty($result)) {
            return false;
        }

        return $result[0];
    }

    public static function getLastRecords(int $count)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER by id desc LIMIT ' . $count;
        return $db->query($sql, [], static::class);
    }
}
