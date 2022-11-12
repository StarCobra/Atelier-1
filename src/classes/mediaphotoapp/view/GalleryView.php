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
        $addPicture = $this->router->urlFor('addPicture',[['id',$gallery->gallery_id]]);

        $html .="<section><h2>$gallery->name</h2><ul><li>$creator->fullname</li><li>Nombre de photos : $picturesNumber</li><li>Description : $gallery->description</li><li>Créé le : $gallery->created_at</li><li>"; 

        foreach ($galleryTags as $v2) {
           $html .="$v2->name ";
        }
        $html .="</li></ul><div><a href=$updateGallery><button>Mettre à jour la galerie</button></a><br><a href=$addPicture><button>Ajouter une photo</button></a></div></section><article>";
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


