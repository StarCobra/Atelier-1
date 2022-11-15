<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;

class GiveAccessToUsersView extends MediaphotoView implements Renderer
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

        $addUsers = $this->router->urlFor('giveAccessToUsers', [['id', $gallery->gallery_id]]);

        $html = "<section>
                \n<h2>Ajouter un utilisateur </h2>

                \n<form action = '$addUsers' method = 'POST'>
                    \n<label for = 'users'> Les utilisateurs qui ont accès : " . $usersNames . "</label><br>
                    \n<label for = 'user'>Pseudo de l&apos;utilisateur</label>
                    \n<input type = 'text' name = 'user' placeholder = 'Pseudo de l&apos;utilisateur que vous voulez ajouter :' required>";
        if (isset($_POST["submitUser"])) {
            $html2 =  "\n<input type = 'submit' value ='Ajouter l&apos;utilisateur !' name = 'submitUser'>
                \n</form>
                \n</section>";
            for ($i = 0; $i < count($users); $i++) {
                if ($users[$i]->username == $_POST["user"]) {
                    $html2 = "\n<p>Cet utlisateur existe déjà !</p>\n<input type = 'submit' value ='Ajouter l&apos;utilisateur !' name = 'submitUser'>
                        \n</form>
                        \n</section>";
                }
            }
        } else {
            $html2 =  "\n<input type = 'submit' value ='Ajouter l&apos;utilisateur !' name = 'submitUser'>
                \n</form>
                \n</section>";
        }
        return $html . $html2;
    }
}
