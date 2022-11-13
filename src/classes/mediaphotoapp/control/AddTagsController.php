<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mf\router\Router;
use iutnc\mediaphotoapp\model\Gallery;
use iutnc\mediaphotoapp\model\Tag;
use iutnc\mediaphotoapp\view\AddTagsView;
use iutnc\mf\control\AbstractController;




class AddTagsController extends AbstractController
{
   public function execute(): void
   {
      $gallery = Gallery::find($_GET['id']);
      
   }
}
