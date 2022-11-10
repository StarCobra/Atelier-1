<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;

class UserView extends MediaphotoView implements Renderer
{
    public function render(): string
    {
        $user = $this->data[0];
        $url_createGallery = (new \iutnc\mf\router\Router())->urlFor('createGallery', [['id', $user->user_id]]);
        $infoProfil = "<h3>Mon profil</h3>\n<p>" . $user->fullname . "</p>\n<p>" . $user->username . "</p>\n<h3>Mes galeries</h3>\n<a href = '" . $url_createGallery . "'>\n<button>Créer galerie</button>\n</a>";
    
        $finalView = "";

        $galleries = $this->data[1];
        foreach ($galleries as $v) {
            $tag = $v->galleryTags()->get();
            $picture = $v->galleryPictures()->get();

            $url_gallery = $this->router->urlFor('galleryDetails',[['id',$v->gallery_id]]);
            $tags = "";

            $image = "<div>\n<a href = $url_gallery>\n<img src = upload/".$picture[0]->file.">\n</a>\n";

            $description = $v->name . "" . $user->username . "";
            for ($i = 0; $i < count($tag); $i++) {
                $tags .= $tag[$i]->name." ";
            }
            $description .= $tags . "</div>";

            $finalView .= $image . $description;
        }

        return $infoProfil . $finalView;
    }
}
