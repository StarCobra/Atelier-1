<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mf\router\Router;
use iutnc\mediaphotoapp\model\Gallery;
use iutnc\mf\control\AbstractController;
use iutnc\mediaphotoapp\view\UpdateGalleryView;

class UpdateGalleryController extends AbstractController
{
    public function execute(): void
    {
        if ($this->request->method === "GET") {
            $gallery = Gallery::find($_GET['id']);

            $v = new UpdateGalleryView($gallery);
            $v->makePage();
        } else {
            $gallery = Gallery::find($_GET['id']);
            $name = $_POST['name'];
            $description = $_POST['description'];
            $status = $_POST['confidentialite'];


            $gallery->name = $name;
            $gallery->description = $description;
            $gallery->status = $status;
            $gallery->save();

            Router::executeRoute('view_gallery', ['id', $gallery->gallery_id]);
        }
    }
}
