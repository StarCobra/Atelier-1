<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mf\router\Router;
use iutnc\mediaphotoapp\model\Gallery;
use iutnc\mediaphotoapp\view\HomeView;
use iutnc\mf\control\AbstractController;


 class PrivateGalleriesController extends AbstractController  
{
   public function execute(): void
   {   
      $privateGalleries = Gallery::where('status','=','1')->get();
      $privateGalleries->where();
      $v = new HomeView($publicGalleries);
      $v->makePage();
   }
}
