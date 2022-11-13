<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;

class OtherUserView extends MediaphotoView implements Renderer
{
    public function render(): string
    {
        $user = $this->data[0];

        $url_createGallery = (new \iutnc\mf\router\Router())->urlFor('createGallery', [['id', $user->user_id]]);
        $infoProfil = "<h3>le profil de $user->fullname </h3>\n<p> Pseudo :" . $user->username . "</p>\n<h3>Ses galeries</h3>";
        $finalView = "";


        $galleries = $this->data[1];

        foreach ($galleries as $v) {
            $tag = $v->galleryTags()->get();
            $picture = $v->pictures()->first();
            $url_gallery = $this->router->urlFor('userGalleryDetails', [['id', $v->gallery_id]]);

            $tags = "";

            if (is_null($picture)) {
                $image = "<div>\n<a href = $url_gallery>\n<img src = html/img/Logo_mediaphoto.png>\n</a>\n";
            } else {
                $image = "<div>\n<a href = $url_gallery>\n<img src = upload/" . $picture->file . ">\n</a>\n";
            }

            $description = $v->name . " " . $user->username . " ";

            for ($i = 0; $i < count($tag); $i++) {
                $tags .= $tag[$i]->name . " ";
            }
            $description .= $tags . "</div>";

            $finalView .= $image . $description;
        }

        return $infoProfil . $finalView;
    }
}