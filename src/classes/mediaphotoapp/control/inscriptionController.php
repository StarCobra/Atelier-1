<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mf\router\Router;
use iutnc\mediaphotoapp\model\user;
use iutnc\mf\control\AbstractController;
use iutnc\mediaphotoapp\view\InscriptionView;
use iutnc\mediaphotoapp\auth\mediaphotoAuthentification;

class InscriptionController extends AbstractController
{
    public function execute(): void
    { 
        if ($this->request->method === "GET"){

            $v = new InscriptionView();
            $v->makePage();
        }
      else{
        if(isset($_POST["submit"])){
            $firstName = $_POST['firstname'];
            $name = $_POST['name'];
            $password = $_POST['password'];
            $mail  =$_POST['mail'];
            $username  =$_POST['pseudo'];

            $check_password = $_POST['check_password'];

            $fullname = $firstName." ".$name;

            if((!empty($firstName))&&(!empty($name))&&(!empty($username))(!empty($password)&&(!empty($mail)))){

            mediaphotoAuthentification::register($username,$password,$fullname,$level=mediaphotoAuthentification::ACCESS_LEVEL_USER);
        Router::executeRoute('view_connexion');
        }else{
            Router::executeRoute('view_inscription');
        }
            }
        }
    }
    }
