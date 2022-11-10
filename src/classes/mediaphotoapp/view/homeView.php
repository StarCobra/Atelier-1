<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;

class HomeView extends MediaphotoView implements Renderer
{
    public function render(): string
    {   
        $publicGalleries=$this->data;
        $html = "";


        foreach ($publicGalleries as $v) {
            $galleryPictures = $v->galleryPictures()->get();

            $picturesNumber = count($galleryPictures);
            $creator = $v->user()->first();
            $galleryLength = count($galleryPictures);
            $randomNumber = rand(1,$galleryLength - 1);
            $randomNumber1 = $randomNumber;
            $randomPicture = $galleryPictures[$randomNumber1];
            $url_gallery = $this->router->urlFor('galleryDetails',[['id',$v->gallery_id]]);
            $url_user = $this->router->urlFor('user',[['id',$v->user_id]]);
                       
            $html .= "<div> <a href = $url_gallery><img src="."upload/".$randomPicture->file."><p></a>$v->name</p><p><a href = '$url_user'>$creator->username</a></p><p>$picturesNumber</p></div>";
        }

        return $html;
    }
}