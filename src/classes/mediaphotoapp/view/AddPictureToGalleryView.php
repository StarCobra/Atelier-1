<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;
use iutnc\mediaphotoapp\view\MediaphotoView;

class AddPictureToGalleryView extends MediaphotoView implements Renderer
{
    public function render(): string
    {   
        // $gallery=$this->data;
        $html = "";

        // $updateGallery = $this->router->urlFor('updateGallery',[['id',$gallery->gallery_id]]);
        // $addPicture = $this->router->urlFor('addPicture',[['id',$gallery->gallery_id]]);

        $html ="<section><h2>Ajouter une image</h2><form action='' method='POST' enctype='multipart/form-data'>
        <label for='file'>Fichier</label>
        <input type='file' name='file'>
        <button type='submit'>Enregistrer</button>
        </form></section>";        

        return $html;
    }
}





