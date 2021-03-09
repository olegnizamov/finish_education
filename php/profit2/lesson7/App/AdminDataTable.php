<?php

namespace App;

use App\View\View;

class AdminDataTable
{
    protected array $models;
    protected array $functions;

    public function __construct(array $models, array $functions)
    {
        $this->models = $models;
        $this->functions = $functions;
    }

    public function render(string $templatePath)
    {
        $view = new View();
        $view->models = $this->models;
        $view->functions = $this->functions;
        return $view->render($templatePath);
    }

    public static function getFunctions()
    {
        return [
            function ($model) {
                return $model->id;
            },
            function ($model) {
                return $model->title;
            },
            function ($model) {
                $author = '';
                if (!is_null($model->author)) {
                    $author = $model->author->name;
                }
                return $author;
            },
            function ($model) {
                return '<a href="/ADMIN/EDIT?id=' . $model->id . '">Редактировать</a><br>
                        <a href="/ADMIN/DELETE?id=' . $model->id . '">Удалить</a>';
            },
        ];
    }

}
