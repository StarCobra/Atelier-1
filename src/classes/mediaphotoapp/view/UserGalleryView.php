<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;
use iutnc\mediaphotoapp\view\MediaphotoView;

class UserGalleryView extends MediaphotoView implements Renderer
{
    public function render(): string
    {
        $gallery = $this->data;
        $html = "";
        $index = 0;

        $galleryPictures = $gallery->pictures()->get();
        $picturesNumber = count($galleryPictures);

        $galleryTags = $gallery->galleryTags()->get();
        $picture = \iutnc\mediaphotoapp\model\Picture::where('gallery_id', '=', $gallery->gallery_id)->get();
        $creator = $gallery->user()->first();
        $url_creator = $this->router->urlFor('otherUser', [['id', $creator->user_id]]);

        $html .= "<section><h2>$gallery->name</h2><ul><li><a href = '$url_creator'>$creator->fullname</a></li><li>Nombre de photos : $picturesNumber</li><li>Description : $gallery->description</li><li>Créé le : $gallery->created_at</li></ul><figcaption>";

        foreach ($galleryTags as $v2) {
            $html .= "<span>$v2->name</span>";
        }
        $html .= "</figcaption></section><article>";
        foreach ($galleryPictures as $v) {
            $pictureTags = $v->pictureTags()->get();

            $loadPicture = $this->router->urlFor('pictureDetails', [['id', $picture[$index]->picture_id]]);
            $index++;

            $html .= "<div> <a href = $loadPicture><img src =" . "upload/" . $v->file . "></a><aside><figcaption>";
            foreach ($pictureTags as $v1) {
                $html .= "<span>$v1->name</span>";
            }
            $html .= "</figcaption></aside></div>";
        }
        $html .= "</article>";

        return $html;
    }
}