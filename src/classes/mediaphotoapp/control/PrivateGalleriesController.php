<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mf\router\Router;
use iutnc\mediaphotoapp\model\User;
use iutnc\mediaphotoapp\model\Gallery;
use iutnc\mediaphotoapp\view\HomeView;
use iutnc\mf\control\AbstractController;
use iutnc\mediaphotoapp\view\PrivateGalleriesView;


 class PrivateGalleriesController extends AbstractController  
{
   public function execute(): void
   { 
    $id = $_GET['id'];
    $myProfile = User::where('user_id','=',$id)->first();
    $myOwnGalleries = $myProfile->galleries()->get();
      $privateGalleriesCanVisit = $myProfile->galleriesAccess()->get();
     
      $publicGalleries = Gallery::where('status','=','0')->get();
      $data=[$myOwnGalleries,$privateGalleriesCanVisit,$publicGalleries];
      $v = new PrivateGalleriesView($data);
      $v->makePage();
   }
}
