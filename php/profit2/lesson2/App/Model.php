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

    public function insert()
    {
        $props = [];
        $binds = [];
        $data = [];
        foreach (get_object_vars($this) as $prop => $value) {
            $props[] = $prop;
            $binds[] = ':' . $prop;
            $data[':' . $prop] = $value;
        }

        $sql = 'INSERT INTO ' . static::TABLE . ' (' . implode(', ', $props) . ') VALUES (' . implode(', ', $binds) . ')';
        $db = new Db();
        $db->execute($sql, $data);
        $this->id = $db->lastInsertId();
    }

    public function update(int $id)
    {
        $props = [];
        $data = [];
        foreach (get_object_vars($this) as $prop => $value) {
            if ('id' === $prop) {
                $data[':' . $prop] = $id;
                continue;
            }
            $props[] = $prop . '=:' . $prop;
            $data[':' . $prop] = $value;
        }

        $sql = 'UPDATE ' . static::TABLE
            . ' SET ' . implode(', ', $props)
            . ' WHERE id = :id';
        $db = new Db();
        $db->execute($sql, $data);
    }

    public function save()
    {
        isset($this->id) ? $this->update($this->id) : $this->insert();
    }

    public function delete()
    {
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id = :id';
        $db = new Db();
        $db->execute($sql, [':id' => $this->id]);
    }
}
