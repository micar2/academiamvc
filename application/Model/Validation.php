<?php

namespace Mini\Model;

use Mini\Libs\Sesion;
use Mini\Core\Database;
use PDO;
class Validation
{
    public static function valAllLoguin($data)
    {
        $total=0;
        if (isset($data['email'])){
            self::valEmailLoguin($data['email']);
        }
        if (isset($data['password'])) {
            self::valPasswordLoguin($data['password']);
        }
        if (isset($data['tipoUsuario'])) {
            self::valTipoUsuario($data['tipoUsuario']);
        }

        foreach ($data as $index => $datum) {
            if (!empty($_POST['error_'.$index])){
                $total++;
            }
        }
        if ($total==0){
            $_POST['error']='todo correcto';
            return $data;
        }else{
            $_POST['error']='hay errores';
            return false;
        }
    }

    public static function valEmailLoguin($data)
    {
        $error='';
        if ( Sesion::userIsLoggedIn()){
            $error.="Ya existe una sesion iniciada";
        }
        if (! empty($data)) {
            $data = trim($data);
            if (isset($_POST["feedback_negative"])){
                if (!empty($_POST['feedback_negative'])){
                $error.=$_POST['feedback_negative'];
                }
            }
            if(! filter_var($data, FILTER_VALIDATE_EMAIL )){
                $error.="el email debe ser valido";
            }
            if (!preg_match("/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/",$data)) {
                $error.= "El email no es valido\n";
            }
            if (strlen($data)<6) {
                $error.= "Email demasiado corto\n";
            }
            $_POST['error_email']= $error;

        }else{
            $error.= "el email esta vacio";
            $_POST['error_email']= $error;
        }
    }

    public static function valPasswordLoguin($data)
    {
        $error='';
        if (!empty($data)) {
                    if (isset($_POST["feedback_negative"])){
                        if (!empty($_POST['feedback_negative'])){
                            $error.=$_POST['feedback_negative'];
                        }
                    }
                    if (strlen($data) < 6) {
                        $error.= " debe tener al menos 6 caracteres\n";
                    }
                    if (strlen($data) > 16) {
                        $error.= "  no puede tener más de 16 caracteres\n";
                    }
                    if (!preg_match('/[0-9]/', $data)) {
                        $error.= " debe tener al menos un caracter numérico";
                    }
                    $_POST['error_password'] = $error;

        } else {
            $error .= "la contraseña esta vacia";
            $_POST['error_password'] = $error;
        }

    }





    public static function valNueroCat($data)
    {
        $error='';
        if (! empty($data)) {
            if ($data != 1 || $data != 2 || $data != 3){
                $error.= "la categoria no es correcta";
                $_POST['error_munero_cat']= $error;
            }

        }else{
            $error.= "la categoria esta sin seleccionar";
            $_POST['error_munero_cat']= $error;
        }
    }






}

