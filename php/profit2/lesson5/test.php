<?php

class Errors extends Exception implements Countable
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

class RegisterForm
{
    protected string $login;
    protected string $password;

    public function __construct($login, $password)
    {
        $errors = new Errors();

        if (strlen($login) < 6) {
            $errors->add(new Exception('Слишком короткий логин'));
        }
        if (strlen($password) < 6) {
            $errors->add(new Exception('Слишком короткий пароль'));
        }

        if (count($errors) > 0) {
            throw $errors;
        }

        $this->login = $login;
        $this->password = $password;
    }

    public function getData()
    {
        return [
            'login' => $this->login,
            'password' => $this->password,
        ];
    }
}

try {
    $dto = new RegisterForm('vasya', '12345');
    var_dump($dto->getData());
} catch (Errors $errors) {
    foreach ($errors->all() as $e) {
        echo 'Ошибка: ' . $e->getMessage();
    }
}
