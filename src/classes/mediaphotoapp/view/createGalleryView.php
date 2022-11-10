<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;
use iutnc\mediaphotoapp\view\MediaphotoView;

class CreateGalleryView extends MediaphotoView implements Renderer
{
    public function render(): string
    {
        $html = "<div>
                <h3>Créer une galerie</h3>
                \n<form method = 'POST'>
                    \n<label for = 'name'>Nom de la galerie</label>
                    \n<input type = 'text' name = 'name' placeholder = 'Nom'>

                    \n<label for = 'description'>Description</label>
                    \n<input type = 'text' name = 'description' placeholder = 'Description'>

                    \n<label for = 'confidentialite'>Confidentialité</label>
                    \n<select name = 'confidentialite'>
                        \n<option value = '0'>Public</option>
                        \n<option value = '1'>Privé</option>
                    \n</select>

                    \n<input type = 'submit' name = 'submit'>
                \n</form>
              \n</div>";

        return $html;
    }
}
