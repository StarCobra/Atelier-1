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
        \iutnc\mf\view\AbstractView::SetAppTitle("Media Photo : Connexion");
        if ($this->request->method === "GET") {
            $v = new ConnexionView();
            $v->makePage();
        } else {
            $username = $_POST['pseudoCnx'];
            $password = $_POST['passwordCnx'];

            if ((!empty($username)) && (!empty($password))) {
                mediaphotoAuthentification::login($username, $password);
                $id =  mediaphotoAuthentification::connectedUser();
                Router::executeRoute('list_galerie', ["id", $id]);
            } else {
                Router::executeRoute('connexion');
            }
        }
    }
}
