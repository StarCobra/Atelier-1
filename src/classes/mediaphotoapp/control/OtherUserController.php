<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mf\view\AbstractView;
use iutnc\mediaphotoapp\view\UserView;
use iutnc\mediaphotoapp\view\OtherUserView;

class OtherUserController extends \iutnc\mf\control\AbstractController
{
    public function execute(): void
    { 
        if (isset($_GET["id"])) {

            $id = $_GET["id"];

            $user = \iutnc\mediaphotoapp\model\User::select()->where('user_id', '=', "$id")->first();
            $galleries = \iutnc\mediaphotoapp\model\Gallery::select()->where('user_id', '=', "$id")->get();
            $data = [$user, $galleries];

            $instance = new OtherUserView($data);
            AbstractView::setAppTitle("Media Photo : Utilisateur");
            $instance->makePage();
        }
    }
}