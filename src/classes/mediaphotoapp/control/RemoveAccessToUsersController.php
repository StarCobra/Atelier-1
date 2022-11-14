<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mf\router\Router;
use iutnc\mediaphotoapp\model\User;
use iutnc\mediaphotoapp\model\Gallery;
use iutnc\mediaphotoapp\view\HomeView;
use iutnc\mf\control\AbstractController;
use iutnc\mediaphotoapp\model\AccessUser;
use iutnc\mediaphotoapp\view\GalleryView;
use iutnc\mediaphotoapp\view\RemoveAccessToUsersView;


class RemoveAccessToUsersController extends AbstractController
{
    public function execute(): void
    {

        $gallery = Gallery::find($_GET['id']);
        $n = 2;

        if (isset($_POST["submitUser"])) {

            mb_strtolower($_POST["user"]);
            $usersWhoHasAccess = $gallery->galleryToAccess()->get();

            for ($i = 0; $i < count($usersWhoHasAccess); $i++) {

                if ($usersWhoHasAccess[$i]->username == $_POST["user"]) {
                    $n = 1;
                    $userToDetach = $usersWhoHasAccess[$i];
                }
            }

            if ($n == 1) {
                $gallery->galleryToAccess()->detach($userToDetach);
                Router::executeRoute('view_gallery', ["id", $gallery->gallery_id]);
            } else {

                $v = new RemoveAccessToUsersView($gallery);
                $v->makePage();
            }
        } else {
            $v = new RemoveAccessToUsersView($gallery);
            $v->makePage();
        }
    }
}
