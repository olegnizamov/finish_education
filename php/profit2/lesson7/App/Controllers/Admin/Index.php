<?php

namespace App\Controllers\Admin;

use App\AdminDataTable;
use App\Controller;
use App\Models\Article;

class Index extends Controller
{
    public function action()
    {
        $dataTable = new AdminDataTable(iterator_to_array(Article::findAll()), AdminDataTable::getFunctions());
        $this->view->dataTable = $dataTable->render(__DIR__ . '/../../Templates/adminDataTable.php');
        $this->view->display(__DIR__ . '/../../Templates/list.php');
    }
}
