<?php

namespace App\Controllers;

use App\Controller;

class FrontController extends Controller
{

    /**
     * Систему ЧПУ. Адрес вида /XXX/YYY/ZZZ должен транслироваться
     * в контроллер XXX\YYY (вложенность пространств имен неограничена) и действие ZZZ
     */

    /**
     * Примеры путей контроллера:
     * /ARTICLE?id=3
     * /INDEX
     *
     * /ADMIN/DELETE?id=3
     * /ADMIN/EDIT
     * /ADMIN/EDIT?id=3
     * /ADMIN/SAVE
     * /ADMIN/LIST
     */
    public function action()
    {
        $paths = explode('/', $_SERVER['REQUEST_URI']);
        if (is_array($paths)) {
            $resultPath = array_map(function ($path) {
                return ucfirst(strtolower($path));
            }, $paths);
            $resultPath = array_filter($resultPath);

            if (!empty($resultPath)) {
                $lastElement = array_pop($resultPath);
                $params = explode('?', $lastElement);

                if (!empty($params)) {
                    $lastElement = current($params);
                    $params = next($params);
                }

                array_push($resultPath, $lastElement);
                $className = implode('\\', $resultPath);
            }
        }


        $className = $className ?? 'Index';
        $class = '\App\Controllers\\' . $className;

        if (class_exists($class)) {
            $controller = new $class;
            $controller->action();
        }
    }

}

