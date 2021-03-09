<?php

namespace App\Models;

use App\Model;

class Article extends Model
{
    protected const TABLE = 'news';

    public string $title;
    public string $contents;
    public int $author_id;


    /**
     * @param string $key
     * @return Author|null
     */
    public function __get(string $key): ?Author
    {
        if ('author' == $key && !empty($this->author_id)) {
            $authorObj = Author::findById($this->author_id);
            if (!empty($authorObj)) {
                return $authorObj;
            }
        }

        return null;
    }
}
