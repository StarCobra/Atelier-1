<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mf\router\Router;
use iutnc\mf\control\AbstractController;
use iutnc\mediaphotoapp\view\InscriptionView;
use iutnc\mf\exceptions\AuthentificationException;
use iutnc\mediaphotoapp\auth\mediaphotoAuthentification;
use iutnc\mediaphotoapp\model\User;

class InscriptionController extends AbstractController
{
    public function execute(): void
    {
        \iutnc\mf\view\AbstractView::SetAppTitle("Media Photo : Inscription");
        if ($this->request->method === "GET") {
            $v = new InscriptionView();
            $v->makePage();
        } else {
            $firstName = $_POST['firstname'];
            $name = $_POST['name'];
            $password = $_POST['password'];
            $mail  = $_POST['mail'];
            $username  = $_POST['pseudo'];

            $check_password = $_POST['check_password'];
            $fullname = $firstName . " " . $name;

            if ((!empty($firstName)) && (!empty($name)) && (!empty($username)) && (!empty($password) && (!empty($check_password) && (!empty($mail))))) {

                $user = User::where('username','=',$username)->first();
                if ($user !== null) {
                    $v = new InscriptionView();
                    $v->makePage();
                } else {
                    if ($check_password !== $password) {
                        $v = new InscriptionView();
                        $v->makePage();
                    }  else {
                    mediaphotoAuthentification::register($username, $password, $fullname, $mail, $level = mediaphotoAuthentification::ACCESS_LEVEL_AUTHENTIFICATE_USER);
                    Router::executeRoute('list_galeriePub');
                    }
                }
            } else {
                Router::executeRoute('view_inscription');
            }
        }
    }
}
