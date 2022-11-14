<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;

class UserView extends MediaphotoView implements Renderer
{
    public function render(): string
    {
        $user = $this->data[0];

        $url_createGallery = (new \iutnc\mf\router\Router())->urlFor('createGallery', [['id', $user->user_id]]);
        $infoProfil = "<section><h2>Mon profil</h2>\n<ul><li>" . $user->fullname . "</li>\n<li>@" . $user->username . "</li></ul>\n<h3>Mes galeries</h3>\n<a href = '" . $url_createGallery . "'>\n<button>Créer galerie</button>\n</a></section>";
        $finalView = "<article>";
        $galleries = $this->data[1];

        foreach ($galleries as $v) {
            $tag = $v->galleryTags()->get();
            $picture = $v->pictures()->first();
            $url_gallery = $this->router->urlFor('galleryDetails', [['id', $v->gallery_id]]);
            $tags = "";

            if (is_null($picture)) {
                $image = "<div>\n<a href = $url_gallery>\n<img src = html/img/Logo_mediaphoto.png>\n</a>\n";
            } else {
                $image = "<div>\n<a href = $url_gallery>\n<img src = upload/" . $picture->file . ">\n</a>\n";
            }

            $description = "<aside><h3>" . $v->name . "</h3><p>" . $user->username . "</p><figcaption>";

            for ($i = 0; $i < count($tag); $i++) {
                $tags .= "<span>" . $tag[$i]->name . "</span>";
            }
            $description .= $tags . "</figcaption></aside></div>";

            $finalView .= $image . $description;
        }
        return $infoProfil . $finalView  . "</article>";
    }
}
