<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mf\router\Router;
use iutnc\mediaphotoapp\model\Gallery;
use iutnc\mf\control\AbstractController;
use iutnc\mediaphotoapp\view\UpdateGalleryView;

class UpdateAccessUsersGalleryController extends AbstractController
{
    public function execute(): void
    {
        if ($this->request->method === "GET") {
            $gallery = Gallery::find($_GET['id']);

            $v = new \iutnc\mediaphotoapp\view\UpdateAccessUsersGalleryView($gallery);
            $v->makePage();
        } else {
            $gallery = Gallery::find($_GET['id']);

            $pseudo = $_POST['pseudo'];
            if(\iutnc\mediaphotoapp\model\User::where('username', '=', $pseudo)->first() != null) {
               $user = \iutnc\mediaphotoapp\model\User::where('username', '=', $pseudo)->first();
               $requete = new \iutnc\mediaphotoapp\model\AccessUser();
               $requete->gallery_id = $gallery->gallery_id;
               $user_id = $user->user_id;
               $requete->user_id = $user_id;
               $requete->save();

               Router::executeRoute('view_gallery', ["gallery_id", $gallery->gallery_id]);
            } else {
                $v = new \iutnc\mediaphotoapp\view\UpdateAccessUsersGalleryView($gallery);
                $v->makePage();
            }
        
           
        }
    }
}
