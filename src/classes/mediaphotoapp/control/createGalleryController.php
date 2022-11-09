<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mediaphotoapp\view\CreateGalleryView;

class CreateGalleryController extends \iutnc\mf\control\AbstractController
{
    public function execute(): void
    { 
        if (isset($_GET["id"])) {

            $id = $_GET["id"];

            $instance = new CreateGalleryView();
            \iutnc\mf\view\AbstractView::setAppTitle("Madia Photo : Création galerie");
            $instance->makePage();
        }
    }
}