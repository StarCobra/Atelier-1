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

                $extensions = ['jpg', 'png', 'jpeg', 'gif'];
                $maxSize = 100000000;

                $replaced = str_replace(" ", "_", $name);

                if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {
                    move_uploaded_file($tmpName, 'upload/' . $replaced);

                    $req = new Picture();
                    $req->file = $replaced;
                    $req->type = $extension;
                    $req->gallery_id = $galleryId;
                    $req->save();

                    Router::executeRoute('view_gallery', ["id", $gallery->gallery_id]);
                } else {
                    echo "Une erreur est survenue";
                }
            }
        }
    }
}
