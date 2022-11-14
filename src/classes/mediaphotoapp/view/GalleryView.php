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
        $addPicture = $this->router->urlFor('addPicture',[['id',$gallery->gallery_id]]);

        $deleteGallery = $this->router->urlFor('deleteGallery',[['id',$gallery->gallery_id]]);
        $url_creator = $this->router->urlFor('user',[['id',$creator->user_id]]);

        $addTags = $this->router->urlFor('addTags',[['id',$gallery->gallery_id]]);
        $deleteTags = $this->router->urlFor('deleteTags',[['id',$gallery->gallery_id]]);

        $html .="<section><h2>$gallery->name</h2><ul><li><a href = '$url_creator'>$creator->fullname</a></li><li>Nombre de photos : $picturesNumber</li><li>Description : $gallery->description</li><li>Créé le : $gallery->created_at</li><li>"; 

        foreach ($galleryTags as $v2) {
           $html .="$v2->name ";
        }


        $html .="</li></ul><div><a href=$updateGallery><button>Mettre à jour la galerie</button></a><a href=$deleteGallery><button> Supprimer la Gallerie </button></a><a href=$addTags><button> Ajouter un Tag </button></a><a href=$addPicture><button>Ajouter une photo</button></a></div></section><article>";

        foreach ($galleryPictures as $v) {  
                $pictureTags = $v->pictureTags()->get();          
                $loadPicture = $this->router->urlFor('pictureDetails',[['id',$picture[$index]->picture_id]]);
                $addTags = $this->router->urlFor('updatePicture',[['id',$picture[$index]->picture_id]]);
                $deletePicTag = $this->router->urlFor('deletePictureTag',[['id',$picture[$index]->picture_id]]);
                $deletePicture = $this->router->urlFor('deletePicture',[['id',$picture[$index]->picture_id]]);
                
                $html .= "<div> <a href = '$loadPicture'><img src ="."upload/".$v->file."></a><aside>";
                $index++;
            foreach ($pictureTags as $v1) {
                $html .= "$v1->name ";
            }


            $html .= "<nav><a href='$addTags'><button>Ajouter tag</button></a><a href='$deletePicTag'><button>Supprimer tag</button></a><a href='$deletePicture'><button> Supprimer l'image </button></a></nav></aside></div>";

        }
        $html .= "</article>";
        return $html;
    }
}


