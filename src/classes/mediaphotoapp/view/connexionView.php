<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;
use iutnc\mediaphotoapp\view\MediaphotoView;

class ConnexionView extends MediaphotoView implements Renderer
{
    public function render(): string
    {   
        $login= $this->router->urlFor('connexion');

        $html = "<div>
                <h3>Connexion</h3>
                \n<form action='$login' method = 'POST'>
                    \n<input type = 'text' name = 'pseudo' placeholder = 'Pseudo' required />
                    \n<input type = 'text' name = 'password' placeholder = 'Mot de passe' required />

                    \n<input type = 'submit' name = 'submit'>
                \n</form>
              \n</div>";

        return $html;
    }
}