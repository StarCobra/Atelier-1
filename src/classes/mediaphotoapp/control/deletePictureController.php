<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mf\router\Router;
use iutnc\mediaphotoapp\model\Picture;
use iutnc\mf\control\AbstractController;

 class DeletePictureController extends AbstractController  
{
   public function execute(): void
   {
    $pictureId = Picture::find($_GET['id']);
    $picture = \iutnc\mediaphotoapp\model\Picture::where('picture_id','=',$pictureId->picture_id)->delete();

    Router::executeRoute('list_galeriePub');
   }
}
