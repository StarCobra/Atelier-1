<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mediaphotoapp\view\UserView;

class UserController extends \iutnc\mf\control\AbstractController
{
    public function execute(): void
    {
        if (isset($_GET["id"])) {

            $id = $_GET["id"];

            $user = \iutnc\mediaphotoapp\model\User::select()->where('user_id', '=', "$id")->first();
            $galleries = \iutnc\mediaphotoapp\model\Gallery::select()->where('user_id', '=', "$id")->get();
            $data = [$user, $galleries];

            $instance = new UserView($data);
            \iutnc\mf\view\AbstractView::setAppTitle("Media Photo : Utilisateur");
            $instance->makePage();
        }
    }
}
