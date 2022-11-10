<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;
use iutnc\mediaphotoapp\view\MediaphotoView;

class HomeView extends MediaphotoView implements Renderer
{
    public function render(): string
    {
        $publicGalleries = $this->data;
        $html = "";


        foreach ($publicGalleries as $v) {

            $galleryPictures = $v->pictures()->get();
            

            $picturesNumber = count($galleryPictures);
            if ($picturesNumber != 0) {
                $galleryLength = count($galleryPictures);
                $randomNumber = rand(0, $galleryLength - 1);
                $randomNumber1 = $randomNumber;
                $randomPicture = $galleryPictures[$randomNumber1];
            }
            $creator = $v->user()->first();

            
            $url_gallery = $this->router->urlFor('galleryDetails',[['id',$v->gallery_id]]);
            $url_creator = $this->router->urlFor('user',[['id',$creator->user_id]]);
            if ($picturesNumber != 0) {
                $html .= "<div><a href = $url_gallery><img src=" . "upload/" . $randomPicture->file . "></a><p>$v->name</p><p><a href = '$url_creator'>$creator->username</a></p><p>$picturesNumber</p></div>";
            } else {
                $html .= "<div><p><a href = $url_gallery>$v->name</a></p><p>$creator->fullname</p><p>$picturesNumber</p></div>";
            }
        }

        return $html;
    }
}
