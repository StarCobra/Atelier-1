<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mediaphotoapp\view\InscriptionView;

class InscriptionController extends \iutnc\mf\control\AbstractController
{
    public function execute(): void
    { 
        $v = new InscriptionView();
        $v->makePage();
        if(isset($_POST["submit"])){
            $firstName = $_POST['firstname'];
            $name = $_POST['name'];
            $password = $_POST['password'];
            $check_password = $_POST['check_password'];

            $fullname = $firstName." ".$name;

            if ($password === $check_password){
                $requete = new \iutnc\mediaphotoapp\model\user();
                $requete->username = $_POST["pseudo"];
                $requete->fullname = $fullname;
                $requete->mail_address = $_POST["mail"];
                $requete->password = $password;

                $requete->save();
            }
        }
    }
}