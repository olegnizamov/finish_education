<?php

function getData()
{
    if (file_exists(__DIR__ . '/bd.txt')) {
        return file(__DIR__ . '/bd.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    }
    return null;
}
