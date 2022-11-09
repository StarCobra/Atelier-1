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
            $randomNumber = rand(0,$galleryLength);
            $randomNumber1 = $randomNumber - 1;
            $randomPicture = $galleryPictures[$randomNumber1];
           
                $html .= "<div> <img src="."upload/".$randomPicture->file."><p>$v->name</p><p>$creator->fullname</p></div>";
            
           
        }

        return $html;
    }
}