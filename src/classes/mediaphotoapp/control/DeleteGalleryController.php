<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mf\router\Router;
use iutnc\mediaphotoapp\model\Gallery;
use iutnc\mf\control\AbstractController;
use iutnc\mediaphotoapp\auth\mediaphotoAuthentification;

class DeleteGalleryController extends AbstractController
{
    public function execute(): void
    {
        $galleryId = $_GET['id'];
        $id =  mediaphotoAuthentification::connectedUser();
        $gallery = Gallery::find($galleryId);
        $gallery->galleryToAccess()->detach();
        $gallery->galleryTags()->detach();
        $pictures = $gallery->pictures()->get();
        foreach ($pictures as $v1) {
            $v1->pictureTags()->detach();
        }
        $gallery->pictures()->delete();
        $gallery->delete();

        Router::executeRoute('list_galerie', ['id', [$id]]);
    }
}
