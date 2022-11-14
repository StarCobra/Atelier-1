<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mediaphotoapp\model\User;
use iutnc\mediaphotoapp\model\Gallery;
use iutnc\mediaphotoapp\view\UserView;
use iutnc\mediaphotoapp\auth\mediaphotoAuthentification;

class UserController extends \iutnc\mf\control\AbstractController
{
    public function execute(): void
    {

        \iutnc\mf\view\AbstractView::setAppTitle("Media Photo : Profil");
        if (isset($_GET["id"])) {
            $id =  mediaphotoAuthentification::connectedUser();

            $myProfile = User::where('user_id', '=', $id)->first();
            $galleries = Gallery::select()->where('user_id', '=', "$id")->get();
            $privateGalleriesCanVisit = $myProfile->galleriesAccess()->get();

            $data = [$myProfile, $galleries, $privateGalleriesCanVisit];

            $instance = new UserView($data);
            $instance->makePage();
        }
    }
}
