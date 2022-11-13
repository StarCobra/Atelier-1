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
        $index = 0;

        $galleryPictures = $gallery->pictures()->get();
        $picturesNumber = count($galleryPictures);

        $galleryTags = $gallery->galleryTags()->get();

        $picture = \iutnc\mediaphotoapp\model\Picture::where('gallery_id','=',$gallery->gallery_id)->get();

        $creator = $gallery->user()->first();

        $updateGallery= $this->router->urlFor('updateGallery',[['id',$gallery->gallery_id]]);
        $updateTags= $this->router->urlFor('updateTags',[['id',$gallery->gallery_id]]);
        $addPicture = $this->router->urlFor('addPicture',[['id',$gallery->gallery_id]]);

        $url_creator = $this->router->urlFor('user',[['id',$creator->user_id]]);

        $html .="<section><h2>$gallery->name</h2><a href = '$url_creator'>$creator->fullname</a><br>Nombre de photos : $picturesNumber<br>Description : $gallery->description<br>Créé le : $gallery->created_at<br>"; 

        foreach ($galleryTags as $v2) {
           $html .="$v2->name ";
        }
        $html .="<div><button><a href=$updateGallery> Update </a></button><button><a href=$updateTags> Ajouter Tag </a></button><button><a href=$addPicture> Ajouter une photo </a></button><button><a href='#'> Supprimer galerie </a></button></div></section><article>";
        foreach ($galleryPictures as $v) {  
                $pictureTags = $v->pictureTags()->get();          
                $loadPicture = $this->router->urlFor('pictureDetails',[['id',$picture[$index]->picture_id]]);
                $updatePicture = $this->router->urlFor('updatePicture',[['id',$picture[$index]->picture_id]]);
                $deletePicture = $this->router->urlFor('deletePicture',[['id',$picture[$index]->picture_id]]);
                
                $html .= "<div> <a href = '$loadPicture'><img src ="."upload/".$v->file."></a><aside>";
                $index++;

            foreach ($pictureTags as $v1) {
                $html .= "$v1->name";
            }

            $html .= "<button><a href='$updatePicture'>Modifier l'image</a></button><button><a href='$deletePicture'> Supprimer l'image </a></button></aside></div>";
        }
        $html .= "</article>";
        return $html;
    }
}


