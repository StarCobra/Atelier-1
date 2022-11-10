<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;

class UpdateGalleryView extends MediaphotoView implements Renderer
{
    public function render(): string
    {   
        $gallery=$this->data;
        $html = "";

        $updateGallery = $this->router->urlFor('updateGallery',[['id',$gallery->gallery_id]]);
        $updateAccessUsersGallery = $this->router->urlFor('updateAccessUsersGallery',[['id',$gallery->gallery_id]]);
       
        $html = "<div>
        <h3>Créer une galerie</h3>
        \n<form action = '$updateGallery' method = 'POST'>
            \n<label for = 'name'>Nom de la galerie</label>
            \n<input type = 'text' name = 'name' value = $gallery->name>

            \n<label for = 'description'>Description</label>
            \n<input type = 'text' name = 'description' value = '$gallery->description'>

            \n<label for = 'confidentialite'>Confidentialité</label>
            \n<select name = 'confidentialite'>
                \n<option value = '0'>Public</option>
                \n<option value = '1'>Privé</option>
            \n</select>
            \n<label><a href = '$updateAccessUsersGallery'>Modifier la liste des droits d'accès</a></label>

            \n<input type = 'submit' value ='send' name = 'submit'>
        \n</form>
        \n</div>";

        return $html;
    }
}





