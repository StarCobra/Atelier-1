<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mediaphotoapp\view\CreateGalleryView;

class CreateGalleryController extends \iutnc\mf\control\AbstractController
{
    public function execute(): void
    { 
        if (isset($_GET["id"])) {
            $instance = new CreateGalleryView();
            \iutnc\mf\view\AbstractView::setAppTitle("Media Photo : Création galerie");
            $instance->makePage();
        }
        if(isset($_POST["submit"])){
            $requete = new \iutnc\mediaphotoapp\model\Gallery();
            $requete->name = $_POST["name"];
            $requete->description = $_POST["description"];
            $requete->status = $_POST["confidentialite"];
            $requete->user_id = $_GET["id"];

            $requete->save();
        }
    }
}