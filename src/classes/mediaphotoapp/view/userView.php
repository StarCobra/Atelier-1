<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;

class UserView extends MediaphotoView implements Renderer
{
    public function render(): string
    {
        $user = $this->data[0];
        $infoProfil = "<h3>Mon profil</h3>\n<p>" . $user->fullname . "</p>\n<p>" . $user->username . "</p>\n<h3>Mes galeries</h3>\n<button>Ajouter galerie</button>";
    
        $finalView = "";

        $galleries = $this->data[1];
        foreach ($galleries as $v) {
            $tag = $v->galleryWhereTags()->get();
            $picture = $v->galleryWhereAddPicture()->get();
            $tags = "";

            $image = "<div>\n<img src = upload/".$picture[0]->file.">\n";

            $description = $v->name . "<br>" . $user->username . "<br>";
            for ($i = 0; $i < count($tag); $i++) {
                $tags .= $tag[$i]->name." ";
            }
            $description .= $tags . "<br></div>";

            $finalView .= $image . $description;
        }

        return $infoProfil . $finalView;
    }
}
