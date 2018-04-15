<?php

namespace Mini\Controller;

use Mini\Core\Controller;
use Mini\Model\Crud;
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
        $categories=Crud::getAll('categories');
        $columns=Crud::selectColums('categories');
        echo $this->view->render('back/categories/index', ['categories' => $categories, 'columns' => $columns]);
    }

    public function create()
    {
        if (Sesion::userIsLoggedIn()){
            if ($_POST){
                if(Crud::create('categories', $_POST)){
                    unset($_POST);
                    Self::index();
                }
            }else{
                $columns=Crud::selectColums('categories');
                echo $this->view->render('back/categories/create', ['columns' => $columns]);
            }
        }else{
            echo $this->view->render('/home');
        }

    }
}