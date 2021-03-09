<?php

namespace App;

use App\Exceptions\FillException;
use App\Exceptions\MultiException;
use App\Exceptions\NotFoundException;

abstract class Model
{
    protected const TABLE = '';

    public int $id;

    /**
     * @return array|null
     */
    public static function findAll(): ?array
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE;

        return $db->query($sql, [], static::class);
    }

    /**
     * @param int $id
     * @return false|object
     * @throws NotFoundException
     */
    public static function findById(int $id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $result = $db->query($sql, [':id' => $id], static::class);
        if (empty($result)) {
            throw new NotFoundException('Ошибка 404 - не найдено');
        }

        return $result[0];
    }

    /**
     * @param int $count
     * @return array
     */
    public static function getLastRecords(int $count): array
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER by id desc LIMIT ' . $count;
        return $db->query($sql, [], static::class);
    }

    /**
     * @return void
     */
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
        $sql = 'INSERT INTO ' . static::TABLE . ' (' . implode(', ', $props) .
            ') VALUES (' . implode(', ', $binds) . ')';
        $db = new Db();
        $db->execute($sql, $data);
        $this->id = $db->lastInsertId();
    }

    /**
     * @param int $id
     * @return void
     */
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

    /**
     * @return void
     */
    public function save()
    {
        isset($this->id) ? $this->update($this->id) : $this->insert();
    }

    /**
     * @return void
     */
    public function delete()
    {
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id = :id';
        $db = new Db();
        $db->execute($sql, [':id' => $this->id]);
    }

    /**
     * Метод заполняет свойства модели из массива и проверяет их
     *
     * @param array $data
     * @throws MultiException
     */
    public function fill(array $data)
    {
        $errors = new MultiException();
        $props = get_object_vars($this);
        foreach ($data as $key => $value) {
            if (array_key_exists($key, $props)) {
                $this->$key = $value;
            } else {
                $errors->add(new FillException('Свойство ' . $key . ' не найдено!'));
            }

            $validationMethod = 'validate' . ucfirst($key);
            if (method_exists($this, $validationMethod)) {
                $validResult = $this->$validationMethod();
                if ($validResult) {
                    $errors->add($validResult);
                }
            }
        }
        if ($errors->all()) {
            throw $errors;
        }
    }
}
