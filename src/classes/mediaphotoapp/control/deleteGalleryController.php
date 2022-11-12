<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mf\router\Router;
use iutnc\mf\control\AbstractController;

 class DeleteGalleryController extends AbstractController  
{
   public function execute(): void
   {
    $gallery = \iutnc\mediaphotoapp\model\Gallery::find($_GET['id']);

    $galleryPictures = $gallery->pictures()->get();

    foreach ($galleryPictures as $v) {
        $picture = \iutnc\mediaphotoapp\model\Picture::where('gallery_id','=',$gallery->gallery_id)->delete();
    }

    $deletedGallery = \iutnc\mediaphotoapp\model\Gallery::where('gallery_id','=',$gallery->gallery_id)->delete();

    //Router::executeRoute('list_galeriePub');
   }
}
