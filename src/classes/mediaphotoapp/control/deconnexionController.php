<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mf\router\Router;
use iutnc\mf\control\AbstractController;
use iutnc\mediaphotoapp\view\DeconnexionView;
use iutnc\mediaphotoapp\auth\mediaphotoAuthentification;

class DeconnexionController extends AbstractController
{
    public function execute(): void
    { 
        mediaphotoAuthentification::logout();
    Router::executeRoute('list_galeriePub');
    }
}