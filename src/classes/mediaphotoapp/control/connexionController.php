<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mf\router\Router;
use iutnc\mf\control\AbstractController;
use iutnc\mediaphotoapp\view\ConnexionView;
use iutnc\mediaphotoapp\auth\mediaphotoAuthentification;

class ConnexionController extends AbstractController
{
    public function execute(): void
    { 
        if ($this->request->method === "GET"){

            $v = new ConnexionView();
            $v->makePage();
        }
            else{
            $username = $_POST['pseudo'];
            $password = $_POST['password'];
            if((!empty($username))&&(!empty($password))){
                mediaphotoAuthentification::Login($username,$password);
              
               
            Router::executeRoute('list_galerie');
            }else{
                Router::executeRoute('login');
            }}

    }
}