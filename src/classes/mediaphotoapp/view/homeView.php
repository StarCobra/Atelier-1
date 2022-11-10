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
            $randomNumber = rand(0,$galleryLength -1);
            $randomPicture = $galleryPictures[$randomNumber];
           
                $html .= "<div> <div><img src="."upload/".$randomPicture->file."></div><aside><p>$v->name<br>$creator->fullname</p></aside></div>";
                $html .= "<div> <div><img src="."upload/".$randomPicture->file."></div><aside><p>$v->name<br>$creator->fullname</p></aside></div>";
                $html .= "<div> <div><img src="."upload/".$randomPicture->file."></div><aside><p>$v->name<br>$creator->fullname</p></aside></div>";
                $html .= "<div> <div><img src="."upload/".$randomPicture->file."></div><aside><p>$v->name<br>$creator->fullname</p></aside></div>";
                $html .= "<div> <div><img src="."upload/".$randomPicture->file."></div><aside><p>$v->name<br>$creator->fullname</p></aside></div>";
                $html .= "<div> <div><img src="."upload/".$randomPicture->file."></div><aside><p>$v->name<br>$creator->fullname</p></aside></div>";
           
        }

        return $html;
    }
}