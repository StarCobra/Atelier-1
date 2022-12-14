<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;
use iutnc\mediaphotoapp\view\MediaphotoView;

class PrivateGalleriesView extends MediaphotoView implements Renderer
{
    public function render(): string

    {
        $myOwnGalleries = $this->data[0];
        $privateGalleriesCanVisit = $this->data[1];
        $publicGalleries = $this->data[2];
        $allGalleries = [];
        foreach ($publicGalleries as $v) {
            array_push($allGalleries, $v);
        }
        foreach ($myOwnGalleries as $v) {
            array_push($allGalleries, $v);
        }
        foreach ($privateGalleriesCanVisit as $v) {
            array_push($allGalleries, $v);
        }





        $html = "<article>";


        $filtredAllGalleries = array_unique($allGalleries);
        foreach ($filtredAllGalleries as $v) {


            $galleryPictures = $v->pictures()->get();

            if (sizeof($galleryPictures) !== 0) {

                $picturesNumber = count($galleryPictures);
                if ($picturesNumber != 0) {
                    $galleryLength = count($galleryPictures);
                    $randomNumber = rand(0, $galleryLength - 1);
                    $randomNumber1 = $randomNumber;
                    $randomPicture = $galleryPictures[$randomNumber1];
                }
                $creator = $v->user()->first();

                $url_gallery = $this->router->urlFor('userGalleryDetails', [['id', $v->gallery_id]]);
                $url_creator = $this->router->urlFor('otherUser', [['id', $creator->user_id]]);

                if ($picturesNumber != 0) {
                    $html .= "<div><a href = $url_gallery><img src=" . "upload/" . $randomPicture->file . "></a><aside><h3>$v->name</h3><p><a href = '$url_creator'>$creator->username</a><span>$picturesNumber photos</span></p></aside></div>";
                } else {
                    $html .= "<div><h3><a href = $url_gallery>$v->name</a></h3><p>$creator->fullname<span>$picturesNumber photos</span></p></div>";
                }
            }
        }
        $html .= "</article>";
        
        return $html;
    }
}
