<?php

function getArrayPictures(): array
{
    return array_diff(scandir(__DIR__ . '/img'), ['.', '..']);
}
