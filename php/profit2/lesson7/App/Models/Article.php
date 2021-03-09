<?php

namespace App\Models;

use App\Exceptions\ValidateException;
use App\Model;

class Article extends Model
{
    protected const TABLE = 'news';

    public string $title = '';
    public string $contents = '';
    public ?int $author_id;


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

    /**
     * @return ValidateException
     */
    public function validateTitle()
    {
        if (empty($this->title)) {
            return new ValidateException('Свойство $title пустое!');
        }
    }

    /**
     * @return ValidateException
     */
    public function validateContents()
    {
        if (empty($this->contents)) {
            return new ValidateException('Свойство $contents пустое!');
        }
    }
}
