<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;

class HomeView extends MediaphotoView implements Renderer
{
    public function render(): string
    {
        $publicGalleries = $this->data;
        $html = "";

        $html .= "<article>";
        foreach ($publicGalleries as $v) {
            $galleryPictures = $v->galleryPictures()->get();

            $picturesNumber = count($galleryPictures);
            if ($picturesNumber != 0) {
                $galleryLength = count($galleryPictures);
                $randomNumber = rand(0, $galleryLength - 1);
                $randomNumber1 = $randomNumber;
                $randomPicture = $galleryPictures[$randomNumber1];
            }
            $creator = $v->user()->first();

            $galleryLength = count($galleryPictures);
            $randomNumber = rand(1,$galleryLength - 1);
            $randomNumber1 = $randomNumber;
            $randomPicture = $galleryPictures[$randomNumber1];
            $url_gallery = $this->router->urlFor('galleryDetails',[['id',$v->gallery_id]]);
            $url_user = $this->router->urlFor('user',[['id',$v->user_id]]);
                      
            if ($picturesNumber != 0) {
                $html .= "<div><a href = $url_gallery><img src=" . "upload/" . $randomPicture->file . "></a><aside><h3>$v->name</h3><p>$creator->fullname<span>$picturesNumber photos</span></p></aside></div>";
            } else {
                $html .= "<div><h3>$v->name</h3><p>$creator->fullname<span>$picturesNumber photos</span></p></div>";
            }
        }
        $html .= "</article>";
        return $html;
    }
}
