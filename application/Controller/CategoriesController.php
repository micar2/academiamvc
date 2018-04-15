<?php

namespace Mini\Controller;

use Mini\Core\Controller;
use Mini\Model\Back;
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
        if (Back::adminIsLoggedIn()){
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
            echo $this->view->render('home/index');
        }

    }

    public function delete()
    {
        if (Back::adminIsLoggedIn()){
            if(Crud::delete('categories', $_GET['id'])){
                echo $this->view->render('back/categories/index');
            }
        }else{
            echo $this->view->render('home/index');
        }
    }
}