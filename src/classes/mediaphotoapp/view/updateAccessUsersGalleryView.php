<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;

class UpdateAccessUsersGalleryView extends MediaphotoView implements Renderer
{
    public function render(): string
    {   
        $gallery=$this->data;
        $html = "";

        $updateAccessUsersGallery = $this->router->urlFor('updateAccessUsersGallery',[['id',$gallery->gallery_id]]);

        $html = "<div>
                <h3>Créer une galerie</h3>
                \n<form action = '$updateAccessUsersGallery' method = 'POST'>
                    \n<label for = 'name'>Saisir le pseudo de la personne</label>
                    \n<input type = 'text' name = 'pseudo'>";
        if(isset($_POST['pseudo'])) {
        if(empty(\iutnc\mediaphotoapp\model\User::where('username', '=', $_POST["pseudo"])->first())) {
            $html2 = "\n<p>Cet utilisateur n'existe pas !</p>\n<input type = 'submit' value ='Ajouter' name = 'submit'>
            \n</form>
            \n</div>";
        } else {
            $html2 = "\n<input type = 'submit' value ='Ajouter' name = 'submit'>
            \n</form>
            \n</div>";
        }} else {
            $html2 = "\n<input type = 'submit' value ='Ajouter' name = 'submit'>
            \n</form>
            \n</div>";
        }

        return $html.$html2;
    }
}