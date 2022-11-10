<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;

class ConnexionView extends MediaphotoView implements Renderer
{
    public function render(): string
    {   
        $html = "<section>
                <h3>Connexion</h3>
                \n<form method = 'POST'>
                    \n<input type = 'text' name = 'pseudo' placeholder = 'Pseudo'>
                    \n<input type = 'text' name = 'password' placeholder = 'Mot de passe'>

                    \n<input type = 'submit' name = 'submit'>
                \n</form>
              \n</section>";

        return $html;
    }
}