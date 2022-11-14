<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;
use iutnc\mediaphotoapp\view\MediaphotoView;

class AddPictureToGalleryView extends MediaphotoView implements Renderer
{
    public function render(): string
    {
        $html = "<section><h2>Ajouter une image</h2><form action='' method='POST' enctype='multipart/form-data'>
        <label for='file'>Fichier</label>
        <input type='file' name='file'>
        <button type='submit'>Enregistrer</button>
        </form></section>";

        return $html;
    }
}
