<?php

namespace Mini\Controller;

use Mini\Core\Controller;
use Mini\Model\Category;
use Mini\Libs\Sesion;
use Mini\Model\Validation;

class CategoriesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->addData(['titulo' => 'Admin']);
    }

    public function index()
    {
        echo $this->view->render('back/categories/index');
    }
}