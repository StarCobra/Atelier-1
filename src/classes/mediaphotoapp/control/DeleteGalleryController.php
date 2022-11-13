<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mf\router\Router;
use iutnc\mediaphotoapp\model\Gallery;
use iutnc\mf\control\AbstractController;
use iutnc\mediaphotoapp\view\DeconnexionView;
use iutnc\mediaphotoapp\auth\mediaphotoAuthentification;

class DeleteGalleryController extends AbstractController
{
    public function execute(): void
    { 
        $galleryId = $_GET['id'];
        $id =  mediaphotoAuthentification::connectedUser();
        $gallery = Gallery::find($galleryId);
        $gallery->galleryTags()->detach();
        $gallery->pictures()->delete();
         $gallery->delete();
     
            Router::executeRoute('list_galerie',['id',[$id]]);
         
        
        
    
    }
}