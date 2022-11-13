<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mf\router\Router;
use iutnc\mediaphotoapp\model\Picture;
use iutnc\mf\control\AbstractController;
use iutnc\mediaphotoapp\model\User;
use iutnc\mediaphotoapp\auth\mediaphotoAuthentification;

 class DeletePictureController extends AbstractController  
{
   public function execute(): void
   {    
    $pictureId = Picture::find($_GET['id']);

    $id = mediaphotoAuthentification::connectedUser();
    
    $picture = \iutnc\mediaphotoapp\model\Picture::where('picture_id','=',$pictureId->picture_id)->delete();

    $_GET['id'] = $id;

    Router::executeRoute('view_userProfil', ["user_id", $_GET['id']]);
   }
}