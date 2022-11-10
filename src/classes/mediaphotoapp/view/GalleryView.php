<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;
use iutnc\mediaphotoapp\view\MediaphotoView;

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
        $updateTags= $this->router->urlFor('updateTags',[['id',$gallery->gallery_id]]);
        $addPicture = $this->router->urlFor('addPicture',[['id',$gallery->gallery_id]]);

        $url_creator = $this->router->urlFor('user',[['id',$creator->user_id]]);

        $html .="<section><h2>$gallery->name</h2><a href = '$url_creator'>$creator->fullname</a><br>Nombre de photos : $picturesNumber<br>Description : $gallery->description<br>Créé le : $gallery->created_at<br>"; 

        foreach ($galleryTags as $v2) {
           $html .="$v2->name ";
        }
        $html .="<div><a href=$updateGallery> Update </a><br><a href=$addPicture> Ajouter une photo </a></div></section><article>";
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


