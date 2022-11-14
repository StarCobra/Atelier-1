<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mf\router\Router;
use iutnc\mediaphotoapp\model\Gallery;
use iutnc\mediaphotoapp\view\HomeView;
use iutnc\mf\control\AbstractController;
use iutnc\mediaphotoapp\model\AccessUser;
use iutnc\mediaphotoapp\model\User;
use iutnc\mediaphotoapp\view\GalleryView;
use iutnc\mediaphotoapp\view\GiveAccessToUsersView;


class GiveAccessToUsersController extends AbstractController
{
    public function execute(): void
    {

        $gallery = Gallery::find($_GET['id']);
        $n = 2;

        if (isset($_POST["submitUser"])) {

            mb_strtolower($_POST["user"]);
            $usersWhoHasAccess = $gallery->galleryToAccess()->get();

            for ($i = 0; $i < count($usersWhoHasAccess); $i++) {
                if ($usersWhoHasAccess[$i]->unsername == $_POST["user"]) {
                    $n = 1;
                }
            }

            if ($n == 1) {
                $v = new GiveAccessToUsersView($gallery);
                $v->makePage();
            } else {
                $userName = $_POST["user"];
                $user = User::where('username', '=', "$userName")->first();
                $req = new AccessUser();
                $req->gallery_id = $gallery->gallery_id;

                echo $gallery->gallery_id;

                $req->user_id = $user->user_id;
                $req->save();


                Router::executeRoute('view_gallery', ["id", $gallery->gallery_id]);
            }
        } else {
            $v = new GiveAccessToUsersView($gallery);
            $v->makePage();
        }
    }
}
