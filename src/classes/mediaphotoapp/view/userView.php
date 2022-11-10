<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;

class UserView extends MediaphotoView implements Renderer
{
    public function render(): string
    {
        $user = $this->data[0];
        $rt = (new \iutnc\mf\router\Router())->urlFor('createGallery', [['id', $user->user_id]]);
        $infoProfil = "<h3>Mon profil</h3>\n<p>" . $user->fullname . "</p>\n<p>" . $user->username . "</p>\n<h3>Mes galeries</h3>\n<a href = '".$rt."'>\n<button>Créer galerie</button>\n</a>";

        $galleries = $this->data[1];
        foreach ($galleries as $v) {
            $tag = $v->galleryTags()->get();
            $picture = $v->galleryPictures()->get();
            $tags = "";

            for ($i=0; $i < count($picture); $i++) { 
                $chemin = "upload/";
                $chemin .= $picture[0]->file;
                
                $image = "<div>\n<img src = ".$chemin.">";
            }
            $description = $v->name . "<br>" . $user->username . "<br>";
            for ($i = 0; $i < count($tag); $i++) {
                $tags .= $tag[$i]->name." ";
            }
            $description .= $tags . "<br></div>";
        }

        return $infoProfil . $image . $description;
    }
}
