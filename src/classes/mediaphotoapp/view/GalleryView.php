<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;

class GalleryView extends MediaphotoView implements Renderer
{
    public function render(): string
    {   
        $gallery=$this->data;
        $html = "";

        $galleryPictures = $gallery->galleryPictures()->get();
        $picturesNumber = count($galleryPictures);

        $galleryTags = $gallery->galleryTags()->get();
        
        
        $creator = $gallery->user()->first();
        $html .="<section><h2>$gallery->name</h2><br>$creator->fullname<br>Nombre de photos :$picturesNumber<br>Créé le : $gallery->created_at<br>"; 
        foreach ($galleryTags as $v2) {
           $html .="$v2->name<br>";
        }
        $html .="</section>";
        foreach ($galleryPictures as $v) {
            $pictureTags = $v->pictureTags()->get();
                $html .= "<div> <img src ="."upload/".$v->file.">";
            foreach ($pictureTags as $v1) {
                $html.= "<aside>$v1->name</aside></div>";
            }
           
        }

        return $html;
    }
}


