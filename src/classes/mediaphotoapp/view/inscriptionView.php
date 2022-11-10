<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;

class InscriptionView extends MediaphotoView implements Renderer
{
    public function render(): string
    {   
        $html = "<div>
                <h3>Inscription</h3>
                \n<form method = 'POST'>
                    \n<input type = 'text' name = 'firstname' placeholder = 'Prénom' required>
                    \n<input type = 'text' name = 'name' placeholder = 'Nom' required>

                    \n<input type = 'text' name = 'pseudo' placeholder = 'Pseudo' required>
                    \n<input type = 'mail' name = 'mail' placeholder = 'Adresse mail' required>

                    \n<input type = 'password' name = 'password' placeholder = 'Mot de passe' required>
                    \n<input type = 'password' name = 'check_password' placeholder = 'Confirmer le mot de passe' required>

                    \n<input type = 'submit' name = 'submit' value = 'S&apos;inscrire'>
                \n</form>
              \n</div>";

        return $html;
    }
}