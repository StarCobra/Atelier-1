<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mediaphotoapp\model\Picture;
use iutnc\mf\control\AbstractController;
use iutnc\mediaphotoapp\view\PictureView;


class PictureController extends AbstractController
{
   public function execute(): void
   {
      $pictureId = $_GET['id'];

      $picture = Picture::where('picture_id', '=', $pictureId)->first();
      $gallery =  $picture->gallery()->first();
      $allPictures =  $gallery->pictures()->get();
      $picturesId = [];
      foreach ($allPictures as $v) {
         array_push($picturesId, $v->picture_id);
      }
      foreach ($picturesId as  $v) {

         if ($picture->picture_id === $v) {

            $nextPictureId = next($picturesId);
            $prevPictureId = prev($picturesId);
         }
      }
      $nextPicture = Picture::find($nextPictureId);
      $prevPicture = Picture::find($prevPictureId);
      $data = [$prevPicture, $picture, $nextPicture];
      $v = new PictureView($data);
      $v->makePage();
   }
}
