<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mediaphotoapp\model\Picture;
use iutnc\mf\control\AbstractController;
use iutnc\mediaphotoapp\view\PictureView;

class PictureController extends AbstractController
{
   public function execute(): void
   {
      \iutnc\mf\view\AbstractView::SetAppTitle("Media Photo : Image");
      $pictureId = $_GET['id'];

      $picture = Picture::where('picture_id', '=', $pictureId)->first();
      $v = new PictureView($picture);
      $v->makePage();
   }
}
