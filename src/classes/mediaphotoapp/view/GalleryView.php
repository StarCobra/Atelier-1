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
        $html .="<section><h2>$gallery->name</h2>$creator->fullname<br>Nombre de photos : $picturesNumber<br>Créé le : $gallery->created_at<br>"; 
        foreach ($galleryTags as $v2) {
           $html .="$v2->name ";
        }
        $html .="</section><article>";
        foreach ($galleryPictures as $v) {
            $pictureTags = $v->pictureTags()->get();
                $html .= "<div> <a href = '#'><img src ="."upload/".$v->file."></a><aside>";
            foreach ($pictureTags as $v1) {
                $html.= "$v1->name ";
            }
            $html .= "</aside></div>";
        }
        $html .= "</article>";
        return $html;
    }
}


