<?php

namespace App\Exceptions;

use Exception;

class MultiException extends Exception
{
    protected $errors = [];

    public function add($error)
    {
        $this->errors[] = $error;
    }

    public function all()
    {
        return $this->errors;
    }

    public function count()
    {
        return count($this->errors);
    }
}
