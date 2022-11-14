<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;

class RemoveAccessToUsersView extends MediaphotoView implements Renderer
{
    public function render(): string
    {
        $gallery = $this->data;

        $usersNames = "";
        $users = $gallery->galleryToAccess()->get();
        for ($i = 0; $i < count($users); $i++) {
            $usersNames .= $users[$i]->username;
            if ($i < count($users) - 1) $usersNames .= ", ";
        }

        $detachUsers = $this->router->urlFor('removeAccessToUsers', [['id', $gallery->gallery_id]]);

        $html = "<section>
                \n<h2>Détacher utilisateur </h2>

                \n<form action = '$detachUsers' method = 'POST'>
                    \n<label for = 'users'> Les utilisateurs qui ont accés : " . $usersNames . "</label><br>
                    \n<label for = 'user'>Pseudo dutilisateur</label>
                    \n<input type = 'text' name = 'user' placeholder = 'Pseudo dutilisateur qui vous voulez détaché' required>";
        if (isset($_POST["submitUser"])) {
            $html2 =  "\n<input type = 'submit' value ='Detacher lutilisateur' name = 'submitUser'>
                \n</form>
                \n</section>";
            for ($i = 0; $i < count($users); $i++) {
                if ($users[$i]->username !== $_POST["user"]) {
                    $html2 = "\n<p>Cet utlisateur n'existe pas !</p>\n<input type = 'submit' value ='Detacher lutilisateur' name = 'submitUser'>
                        \n</form>
                        \n</section>";
                }
            }
        } else {
            $html2 =  "\n<input type = 'submit' value ='Detacher lutilisateur' name = 'submitUser'>
                \n</form>
                \n</section>";
        }
        return $html . $html2;
    }
}
