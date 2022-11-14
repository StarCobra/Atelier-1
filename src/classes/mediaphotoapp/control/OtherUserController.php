<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mf\view\AbstractView;
use iutnc\mediaphotoapp\model\User;
use iutnc\mediaphotoapp\model\Gallery;
use iutnc\mediaphotoapp\view\OtherUserView;

class OtherUserController extends \iutnc\mf\control\AbstractController
{
    public function execute(): void
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];

            $user = User::select()->where('user_id', '=', "$id")->first();
            $galleries = Gallery::select()->where('user_id', '=', "$id")->where('status', '=', '0')->get();
            $data = [$user, $galleries];

            $instance = new OtherUserView($data);
            AbstractView::setAppTitle("Media Photo : Profil");
            $instance->makePage();
        }
    }
}
