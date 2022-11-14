<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mediaphotoapp\model\Gallery;
use iutnc\mf\control\AbstractController;
use iutnc\mediaphotoapp\view\UserGalleryView;

class UserGalleryController extends AbstractController
{
   public function execute(): void
   {
      $galleryId = $_GET['id'];

      $gallery = Gallery::where('gallery_id', '=', $galleryId)->first();
      $v = new UserGalleryView($gallery);
      $v->makePage();
   }
}
