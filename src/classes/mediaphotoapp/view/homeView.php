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
            $creator = $v->user()->first();
            $galleryLength = count($galleryPictures);
            $randomNumber = rand(0,$galleryLength - 1);
            $randomNumber1 = $randomNumber;
            $randomPicture = $galleryPictures[$randomNumber1];
            $url_gallery = $this->router->urlFor('galleryDetails',[['id',$v->gallery_id]]);
           
                $html .= "<div> <a href = $url_gallery><img src="."upload/".$randomPicture->file."></a><p>$v->name</p><p>$creator->fullname</p></div>";
            
           
        }

        return $html;
    }
}