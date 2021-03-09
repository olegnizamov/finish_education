<?php

namespace App\Controllers;

use App\Controller;
use App\Controllers\Errors\NotFound;
use App\Controllers\Errors\SqlController;
use App\Exceptions\NotFoundException;
use App\Exceptions\SqlException;
use App\Logger;
use PDOException;

class FrontController extends Controller
{

    /**
     * Систему ЧПУ. Адрес вида /XXX/YYY/ZZZ должен транслироваться
     * в контроллер XXX\YYY (вложенность пространств имен неограничена) и действие ZZZ
     * Примеры путей контроллера:
     * /ARTICLE?id=3
     * /INDEX
     *
     * /ADMIN/DELETE?id=3
     * /ADMIN/EDIT
     * /ADMIN/EDIT?id=3
     * /ADMIN/SAVE
     * /ADMIN/INDEX
     */
    public function action()
    {
        $className = $this->route($_SERVER['REQUEST_URI']) ?? 'Index';
        $class = '\App\Controllers\\' . $className;
        $logger = new Logger();

        try {
            $controller = new $class;
            $controller->action();
        } catch (SqlException | PDOException $e) {
            $logger->log($e);
            $errorController = new SqlController();
            $errorController->action();
        } catch (NotFoundException $e) {
            $logger->log($e);
            $errorController = new NotFound();
            $errorController->action();
        }
    }

    /**
     * @param string $requestUrl
     * @return string|null
     */
    protected function route(string $requestUrl): ?string
    {
        $paths = explode('/', $requestUrl);
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

        return $className;
    }
}
