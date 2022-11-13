<?php

namespace iutnc\mediaphotoapp\control;
use iutnc\mf\router\Router;
use iutnc\mediaphotoapp\model\Picture;
use iutnc\mediaphotoapp\view\SuppTagView;
use iutnc\mf\control\AbstractController;
use iutnc\mediaphotoapp\auth\mediaphotoAuthentification;
use iutnc\mediaphotoapp\view\DeletePictureTagView;
use iutnc\mediaphotoapp\view\DeleteTagsView;

class DeletePictureTagController extends AbstractController
{
   public function execute(): void
   { 
      $picture = Picture::find($_GET['id']);
      $n = 2;

      if (isset($_POST["submitErase"])) {
         if (mb_substr($_POST["tag"], 0, 1) == "#") {
            mb_strtolower($_POST["tag"]);
            $tag = $picture->pictureTags()->get();

            for ($i = 0; $i < count($tag); $i++) {
               if ($tag[$i]->name == $_POST["tag"]) {
                  $n = 1;
               } 
            }
            
            if($n == 1) {
               $name =  \iutnc\mediaphotoapp\model\Tag::where('name', '=', $_POST['tag'])->first();
               $id = \iutnc\mediaphotoapp\model\Tag::select('tag_id')->where('name', '=', $_POST['tag'])->first();
               $req1 =  \iutnc\mediaphotoapp\model\PictureTag::where('tag_id', '=', $id->tag_id)->delete();   
               $req = \iutnc\mediaphotoapp\model\Tag::where('name', '=', $name->name)->delete();   
               
               $id = mediaphotoAuthentification::connectedUser();

               $_GET['id'] = $id;

               Router::executeRoute('view_userProfil', ["user_id", $_GET['id']]);
            } else {
               $v = new DeletePictureTagView($picture);
               $v->makePage();
            }

         } else {
            $v = new DeletePictureTagView($picture);
            $v->makePage();
         }
      } else {
         $v = new DeletePictureTagView($picture);
         $v->makePage();
      }
   }
}
