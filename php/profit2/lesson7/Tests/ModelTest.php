<?php

namespace Tests;

use App\Db;
use App\Exceptions\MultiException;
use App\Models\Article;

class ModelTest
{
    public static function execute()
    {
        self::testFillSuccess();
        self::testFillFail();
    }

    public static function testFillSuccess(): void
    {
        $article = new Article();
        try {
            $article->fill([
                'title'    => '123',
                'contents' => '123',
            ]);
        } catch (MultiException $e) {
            if ($e->count() > 0) {
                $exceptions = $e->all();
                foreach ($exceptions as $exception) {
                    var_dump($exception->getMessage());
                    assert(null === $exception->getMessage());
                }
            }
        }
    }

    public static function testFillFail(): void
    {
        $article = new Article();
        $data = [
            'title'    => '',
            'contents' => '',
            'test'     => 'testestset',
        ];
        try {
            $article->fill($data);
        } catch (MultiException $e) {
            if ($e->count() > 0) {
                $exceptions = $e->all();
                foreach ($exceptions as $exception) {
                    var_dump($exception->getMessage());
                    assert(null === $exception->getMessage());
                }
            }
        }
    }
}
