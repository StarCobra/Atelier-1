<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mediaphotoapp\view\DeconnexionView;

class DeconnexionController extends \iutnc\mf\control\AbstractController
{
    public function execute(): void
    { 
        $v = new DeconnexionView();
        $v->makePage();
        if(isset($_POST["submit"])){

        }
    }
}