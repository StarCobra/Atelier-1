<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;

class AddPictureToGalleryView extends MediaphotoView implements Renderer
{
    public function render(): string
    {   
        // $gallery=$this->data;
        $html = "";

        // $updateGallery = $this->router->urlFor('updateGallery',[['id',$gallery->gallery_id]]);
        // $addPicture = $this->router->urlFor('addPicture',[['id',$gallery->gallery_id]]);

$html ="<form action='' method='POST' enctype='multipart/form-data'>
<label for='file'>Fichier</label>
<input type='file' name='file'>
<button type='submit'>Enregistrer</button>
</form>";        

        return $html;
    }
}





