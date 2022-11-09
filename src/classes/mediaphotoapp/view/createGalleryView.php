<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;

class CreateGalleryView extends MediaphotoView implements Renderer
{
    public function render(): string
    {
        $html = "<div>
                <h3>Créer une galerie</h3>
                \n<form method = 'POST'>
                    \n<label for = 'name'>Nom de la galerie</label>
                    \n<input type = 'text' name = 'name' placeholder = 'Nom'>
                    \n<label for = 'motsClefs'>Liste de mots-clés</label>
                    \n<input type = 'text' name = 'mots' placeholder = '#Tags, #Tags'>
                    \n<label for = 'motsClefs'>Confidentialité</label>
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
