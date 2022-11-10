<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;

class UserView extends MediaphotoView implements Renderer
{
    public function render(): string
    {
        $user = $this->data[0];
        $rt = (new \iutnc\mf\router\Router())->urlFor('createGallery', [['id', $user->user_id]]);
        $infoProfil = "<h3>Mon profil</h3>\n<p>" . $user->fullname . "</p>\n<p>" . $user->username . "</p>\n<h3>Mes galeries</h3>\n<a href = '" . $rt . "'>\n<button>Créer galerie</button>\n</a>";

        $finalView = "";

        $galleries = $this->data[1];

        foreach ($galleries as $v) {
     
            if(count($v->galleryTags()->get()) != 0) {
                $tag = "";
            } else {
                $tag = $v->galleryTags()->get();
            }
            
            if(count($v->galleryPictures()->get()) != 0) {
                $picture = "";
            } else {
                $picture = $v->galleryPictures()->get();
            }

            $image = "";
            $tags = "";

            if ($picture[0]) {
                $image .= "<div>\n<img src = upload/" . $picture[0]->file . ">\n";
            } else {
                $image = "";
            }

            $description = $v->name . "" . $user->username . "";
            
            if (count($tag) != 0) {
                for ($i = 0; $i < count($tag); $i++) {
                    $tags .= $tag[$i]->name . " ";
                }
            } else {
                $tags = "";
            }
            $description .= $tags . "</div>";

            $finalView .= $image . $description;
        }

        return $infoProfil . $finalView;
    }
}
