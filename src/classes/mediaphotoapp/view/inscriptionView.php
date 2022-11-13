<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;
use iutnc\mediaphotoapp\view\MediaphotoView;

class InscriptionView extends MediaphotoView implements Renderer
{
    public function render(): string
    {   

        $signeUp= $this->router->urlFor('inscription');

        $html = "<section>

                <h3>Inscription</h3>
                \n<form action='$signeUp' method = 'POST' name >
                    \n<input type = 'text' name = 'firstname' placeholder = 'Prénom' required>
                    \n<input type = 'text' name = 'name' placeholder = 'Nom' required>

                    \n<input type = 'text' name = 'pseudo' placeholder = 'Pseudo' required>
                    \n<input type = 'mail' name = 'mail' placeholder = 'Adresse mail' required>

                    \n<input type = 'password' name = 'password' placeholder = 'Mot de passe' required>
                    \n<input type = 'password' name = 'check_password' placeholder = 'Confirmer le mot de passe' required>

                    \n<input type = 'submit' name = 'submit' value = 'S&apos;inscrire'>
                \n</form>
              \n</section>";

        return $html;
    }
}