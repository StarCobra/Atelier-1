<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mediaphotoapp\view\ConnexionView;

class ConnexionController extends \iutnc\mf\control\AbstractController
{
    public function execute(): void
    { 
        $v = new ConnexionView();
        $v->makePage();
        if(isset($_POST["submit"])){
        
            $pseudo = $_GET['pseudo'];
            $password = $_GET['password'];

        }
    }
}