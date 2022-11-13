<?php

namespace iutnc\mediaphotoapp\control;
use iutnc\mf\router\Router;
use iutnc\mediaphotoapp\model\Gallery;
use iutnc\mediaphotoapp\model\Tag;
use iutnc\mediaphotoapp\view\AddTagsView;
use iutnc\mediaphotoapp\view\DeleteTagsView;
use iutnc\mf\control\AbstractController;

class DeleteTagsController extends AbstractController
{
   public function execute(): void
   {
      $gallery = Gallery::find($_GET['id']);
      $n = 2;

      if (isset($_POST["submitErase"])) {
         if (mb_substr($_POST["tag"], 0, 1) == "#") {
            mb_strtolower($_POST["tag"]);
            $tag = $gallery->galleryTags()->get();

            for ($i = 0; $i < count($tag); $i++) {
               if ($tag[$i]->name == $_POST["tag"]) {
                  $n = 1;
               } 
            }
            
            if($n == 1) {
               $name =  \iutnc\mediaphotoapp\model\Tag::where('name', '=', $_POST['tag'])->first();
               $id = \iutnc\mediaphotoapp\model\Tag::select('tag_id')->where('name', '=', $_POST['tag'])->first();
               $req1 =  \iutnc\mediaphotoapp\model\GalleryTag::where('tag_id', '=', $id->tag_id)->delete();   
               $req = \iutnc\mediaphotoapp\model\Tag::where('name', '=', $name->name)->delete();   

               Router::executeRoute('view_gallery', ["gallery_id", $gallery->gallery_id]);
            } else {
               $v = new DeleteTagsView($gallery);
               $v->makePage();
            }

         } else {
            $v = new DeleteTagsView($gallery);
            $v->makePage();
         }
      } else {
         $v = new DeleteTagsView($gallery);
         $v->makePage();
      }
   }
}
