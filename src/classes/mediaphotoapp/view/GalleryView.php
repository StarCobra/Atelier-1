<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;

class GalleryView extends MediaphotoView implements Renderer
{
    public function render(): string
    {   
        $gallery=$this->data;
        $html = "";

        $galleryPictures = $gallery->pictures()->get();
        $picturesNumber = count($galleryPictures);

        $galleryTags = $gallery->galleryTags()->get();
        

        $creator = $gallery->user()->first();
        $updateGallery= $this->router->urlFor('updateGallery',[['id',$gallery->gallery_id]]);
        $addPicture = $this->router->urlFor('addPicture',[['id',$gallery->gallery_id]]);
        $html .="<div>$gallery->name<br>$creator->fullname<br>le nombre des photos :$picturesNumber<br>description : $gallery->description<br>date de création :$gallery->created_at<br><div><a href=$updateGallery> Update </a><br><a href=$addPicture> Ajouter une photo </a></div>"; 

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


