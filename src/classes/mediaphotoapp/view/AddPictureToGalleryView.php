<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;
use iutnc\mediaphotoapp\view\MediaphotoView;

class AddPictureToGalleryView extends MediaphotoView implements Renderer
{
    public function render(): string
    {

        if (isset($_FILES['file'])) {
            $size = $_FILES['file']['size'];
            $m = 100000000;
        
        if(($size <= $m) !== true) {
        } else {
            $html = "<section><h2>Ajouter une image</h2><form action='' method='POST' enctype='multipart/form-data'>
            <label for='file'>Fichier</label>
            <input type='file' name='file'>
            \n<p>Votre fichier n'est pas une image ou il est trop volumineux (< 10 Mo) !</p>
            <button type='submit'>Enregistrer</button>
            </form></section>";
        }
    } else {
        $html = "<section><h2>Ajouter une image</h2><form action='' method='POST' enctype='multipart/form-data'>
        <label for='file'>Fichier</label>
        <input type='file' name='file'>
        <button type='submit'>Enregistrer</button>
        </form></section>"; 
    }
    
        return $html;
    }
}
