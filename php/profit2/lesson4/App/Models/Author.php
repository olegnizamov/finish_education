<?php

namespace App\Models;

use App\Model;

class Author extends Model
{

    protected const TABLE = 'authors';

    public string $name;
}
