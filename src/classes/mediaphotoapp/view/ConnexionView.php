<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;
use iutnc\mediaphotoapp\view\MediaphotoView;
use iutnc\mediaphotoapp\model\User;

class ConnexionView extends MediaphotoView implements Renderer
{
    public function render(): string
    {   if(isset($this->data)) {
        $given_pass = $this->data[0];
        $db_hash = $this->data[1];
    }
        
        $login = $this->router->urlFor('connexion');
    if(isset($_POST['submit'])) {
        $user = User::where('username','=',$_POST['pseudoCnx'])->first();  

        if ($user === null) {
            $html = "<section>

            <h3>Connexion</h3>
            \n<form action='$login' method = 'POST'>

                \n<input type = 'text' name = 'pseudoCnx' placeholder = 'Pseudo' required />
                \n<input type = 'password' name = 'passwordCnx' placeholder = 'Mot de passe' required />
                \n<p>L'utilisateur n'existe pas !</p>
                \n<input type = 'submit' name = 'submit'>
            \n</form>
          \n</section>";
        } else {
         $html = "<section>

                <h3>Connexion</h3>
                \n<form action='$login' method = 'POST'>

                    \n<input type = 'text' name = 'pseudoCnx' placeholder = 'Pseudo' required />
                    \n<input type = 'password' name = 'passwordCnx' placeholder = 'Mot de passe' required />

                    \n<input type = 'submit' name = 'submit'>
                \n</form>
              \n</section>";
        }
        if(isset($this->data)) {
        if (!(password_verify($given_pass, $db_hash))) {
            $html = "<section>

            <h3>Connexion</h3>
            \n<form action='$login' method = 'POST'>

                \n<input type = 'text' name = 'pseudoCnx' placeholder = 'Pseudo' required />
                \n<input type = 'password' name = 'passwordCnx' placeholder = 'Mot de passe' required />
                \n<p>Le mot de passe est incorrect !</p>
                \n<input type = 'submit' name = 'submit'>
            \n</form>
          \n</section>";
        } else {
            $html = "<section>

            <h3>Connexion</h3>
            \n<form action='$login' method = 'POST'>

                \n<input type = 'text' name = 'pseudoCnx' placeholder = 'Pseudo' required />
                \n<input type = 'password' name = 'passwordCnx' placeholder = 'Mot de passe' required />

                \n<input type = 'submit' name = 'submit'>
            \n</form>
          \n</section>";
        }
    }
    } else {
        $html = "<section>

        <h3>Connexion</h3>
        \n<form action='$login' method = 'POST'>

            \n<input type = 'text' name = 'pseudoCnx' placeholder = 'Pseudo' required />
            \n<input type = 'password' name = 'passwordCnx' placeholder = 'Mot de passe' required />

            \n<input type = 'submit' name = 'submit'>
        \n</form>
      \n</section>";
    }
   

        return $html;
    }
}
