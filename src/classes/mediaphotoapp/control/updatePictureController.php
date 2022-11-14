<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mf\router\Router;
use iutnc\mediaphotoapp\model\Picture;
use iutnc\mediaphotoapp\model\Tag;
use iutnc\mf\control\AbstractController;
use iutnc\mediaphotoapp\view\UpdatePictureView;


 class UpdatePictureController extends AbstractController  
{
   public function execute(): void
   {
        $picture = Picture::find($_GET['id']);
        
    
        if(isset($_POST["submit"])){
         if(mb_substr($_POST["tag"], 0, 1) == "#") {
            $req = new \iutnc\mediaphotoapp\model\Tag();
            $req->name = $_POST["tag"];
            $req->save();

            $tag = \iutnc\mediaphotoapp\model\Tag::select()->orderBy("tag_id", "DESC")->first();
            
            $req1 = new \iutnc\mediaphotoapp\model\PictureTag();
            $req1->tag_id = $tag->tag_id;
            $req1->picture_id = $picture->picture_id;
            $req1->save();

            //Router::executeRoute('view_gallery', ["gallery_id", $picture->picture_id]);
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
