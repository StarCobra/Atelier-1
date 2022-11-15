<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mf\router\Router;
use iutnc\mediaphotoapp\model\Gallery;
use iutnc\mediaphotoapp\view\CreateGalleryView;

class CreateGalleryController extends \iutnc\mf\control\AbstractController
{
    public function execute(): void
    {
        \iutnc\mf\view\AbstractView::setAppTitle("Media Photo : Création Galerie");
        if ($this->request->method === "GET") {
            $instance = new CreateGalleryView();
            $instance->makePage();
        } else {
            $requete = new Gallery();

            $requete->name = $_POST["name"];
            $requete->description = $_POST["description"];
            $requete->status = $_POST["confidentialite"];
            $requete->user_id = $_GET["id"];
            $requete->save();

            Router::executeRoute('view_userProfil', ["id", $_GET["id"]]);
        }
    }
}
