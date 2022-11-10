<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mf\router\Router;
use iutnc\mediaphotoapp\model\Gallery;
use iutnc\mediaphotoapp\model\Tag;
use iutnc\mf\control\AbstractController;
use iutnc\mediaphotoapp\view\UpdateTagsView;




 class UpdateTagsController extends AbstractController  
{
   public function execute(): void
   {
        $gallery = Gallery::find($_GET['id']);
        
    
        if(isset($_POST["submitTag"])){
         if(mb_substr($_POST["tag"], 0, 1) == "#") {
            $req = new \iutnc\mediaphotoapp\model\Tag();
            $req->name = $_POST["tag"];
            $req->save();

            $tag = \iutnc\mediaphotoapp\model\Tag::select()->orderBy("tag_id", "DESC")->first();
            
            $req1 = new \iutnc\mediaphotoapp\model\GalleryTag();
            $req1->tag_id = $tag->tag_id;
            $req1->gallery_id = $gallery->gallery_id;
            $req1->save();

            Router::executeRoute('view_gallery', ["gallery_id", $gallery->gallery_id]);
         } else {
            $v = new UpdateTagsView($gallery);
            $v->makePage();
         }

      } else {
         $v = new UpdateTagsView($gallery);
         $v->makePage();
      }

   }
}
