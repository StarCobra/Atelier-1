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
       
        $galleryTags = $gallery->galleryTags()->get();
        
        
        $creator = $gallery->user()->first();
        $html .="<div>$gallery->name<br>$creator->fullname<br>"; 
        foreach ($galleryTags as $v2) {
           $html .="$v2->name<br></div>";
        }
        foreach ($galleryPictures as $v) {
            $pictureTags = $v->pictureTags()->get();
                $html .= "<div> <img src ="."upload/".$v->file.">";
            foreach ($pictureTags as $v1) {
                $html.= "<p>$v1->name</p></div>";
            }
           
        }

        return $html;
    }
}


