<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mf\router\Router;
use iutnc\mediaphotoapp\model\Picture;
use iutnc\mediaphotoapp\view\HomeView;
use iutnc\mf\control\AbstractController;
use iutnc\mediaphotoapp\view\PictureView;


 class PictureController extends AbstractController  
{
   public function execute(): void
   {
        $pictureId = $_GET['id'];
         
        $picture = Picture::where('picture_id','=',$pictureId)->first();
        $v = new PictureView($picture);
        $v->makePage();
   }
}
