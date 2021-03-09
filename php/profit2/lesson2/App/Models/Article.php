<?php

namespace App\Models;

use App\Model;

class Article extends Model
{

    protected const TABLE = 'news';

    public string $title;
    public string $contents;

}
