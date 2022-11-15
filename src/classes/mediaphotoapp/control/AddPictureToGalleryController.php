<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mf\router\Router;
use iutnc\mediaphotoapp\model\Gallery;
use iutnc\mediaphotoapp\model\Picture;
use iutnc\mf\control\AbstractController;
use iutnc\mediaphotoapp\view\AddPictureToGalleryView;


class AddPictureToGalleryController extends AbstractController
{
    public function execute(): void
    {

        \iutnc\mf\view\AbstractView::SetAppTitle("Media Photo : Ajout Image");
        if ($this->request->method === "GET") {
            $v = new AddPictureToGalleryView();
            $v->makePage();
        } else {
            $gallery = Gallery::find($_GET['id']);
            $galleryId =  $gallery->gallery_id;
            if (isset($_FILES['file'])) {

                $tmpName = $_FILES['file']['tmp_name'];
                $name = $_FILES['file']['name'];
                $size = $_FILES['file']['size'];
                $error = $_FILES['file']['error'];

                $tabExtension = explode('.', $name);
                $extension = strtolower(end($tabExtension));

                $extensions = ['jpg', 'png', 'jpeg', 'gif', 'webp'];

                $maxSize = 250000000;
                $m = 100000000;

                if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {
                    $uniqueName = uniqid('', true);
                    $file = $uniqueName.".".$extension;
                    if($size <= $m) {
                    move_uploaded_file($tmpName, './upload/' . $file);

                    $req = new Picture();
                    $req->file = $file;
                    $req->type = $extension;
                    $req->gallery_id = $galleryId;
                    $req->save();
                    Router::executeRoute('view_gallery', ["id", $gallery->gallery_id]);
                    } else {
                        $v = new AddPictureToGalleryView();
                        $v->makePage();
                    }
                } else {
                    $v = new AddPictureToGalleryView();
                    $v->makePage();
                }
            }
        }
    }
}
