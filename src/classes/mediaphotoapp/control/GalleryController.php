<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mediaphotoapp\model\Gallery;
use iutnc\mf\control\AbstractController;
use iutnc\mediaphotoapp\view\GalleryView;


class GalleryController extends AbstractController
{
   public function execute(): void
   {
      \iutnc\mf\view\AbstractView::SetAppTitle("Media Photo : Modifier Galerie");
      $galleryId = $_GET['id'];

      $gallery = Gallery::where('gallery_id', '=', $galleryId)->first();
      $v = new GalleryView($gallery);
      $v->makePage();
   }
}
