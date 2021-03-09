<?php

function getUsersList(): array
{
    return
        [
            'olegnizamov' => '$2y$10$d9FayYHyTFaFJY5hQQ5bWOeK7fnzbcMB4ejf6w0Amvjv40OtUUlCe',//olegnizamov
            'admin'       => '$2y$10$q3SWaW1H19TCOQBRkL46PehW109iIZ6vsXa4xjfqzPNLl0sdw4aH6',//admin
            'pushkin'     => '$2y$10$lZ0hsgJZGjdoEOdqN8N7AuqJqdaQXGuo35Mx.McPOE0jqbphjCCHe',//pushkin
            'lermontov'   => '$2y$10$dz2GAxjN54A.K1Zu1BBWPeIS71gvUP3T64n7nq7oVjRVM58flx0Re',//lermontov
        ];
}

function getArrayPictures(): array
{
    return array_diff(scandir(__DIR__ . '/img'), ['.', '..']);
}

function existsUser(string $login): bool
{
    return (!empty($login) && array_key_exists($login, getUsersList()));
}

function checkPassword(string $login, string $password): bool
{
    return existsUser($login)&& password_verify($password, getUsersList()[$login]);
}

function getCurrentUser(): ?string
{
    if (isset($_SESSION['login']) && true === existsUser($_SESSION['login'])) {
        return $_SESSION['login'];
    }

    return null;
}
