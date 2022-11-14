<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mf\router\Router;
use iutnc\mediaphotoapp\model\Picture;
use iutnc\mf\control\AbstractController;
use iutnc\mediaphotoapp\view\UpdatePictureView;
use iutnc\mediaphotoapp\auth\mediaphotoAuthentification;

class UpdatePictureController extends AbstractController
{
   public function execute(): void
   {
      $picture = Picture::find($_GET['id']);
      $n = 2;

      if (isset($_POST["submitTag"])) {
         if (mb_substr($_POST["tag"], 0, 1) == "#") {
            mb_strtolower($_POST["tag"]);
            $tag = $picture->pictureTags()->get();

            for ($i = 0; $i < count($tag); $i++) {
               if ($tag[$i]->name == $_POST["tag"]) {
                  $n = 1;
               }
            }

            if ($n == 1) {
               $v = new UpdatePictureView($picture);
               $v->makePage();
            } else {
               $req = new \iutnc\mediaphotoapp\model\Tag();
               $req->name = $_POST["tag"];
               $req->save();

               $tag = \iutnc\mediaphotoapp\model\Tag::select()->orderBy("tag_id", "DESC")->first();

               $req1 = new \iutnc\mediaphotoapp\model\PictureTag();
               $req1->tag_id = $tag->tag_id;
               $req1->picture_id = $picture->picture_id;
               $req1->save();

               $id = mediaphotoAuthentification::connectedUser();
               $_GET['id'] = $id;

               Router::executeRoute('view_userProfil', ["user_id", $_GET['id']]);
            }
         } else {
            $v = new UpdatePictureView($picture);
            $v->makePage();
         }
      } else {
         $v = new UpdatePictureView($picture);
         $v->makePage();
      }
   }
}
