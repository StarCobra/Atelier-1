<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mediaphotoapp\model\Gallery;
use iutnc\mediaphotoapp\view\HomeView;
use iutnc\mf\control\AbstractController;


class HomeController extends AbstractController
{
   public function execute(): void
   {
      $publicGalleries = Gallery::where('status', '=', '0')->get();

      \iutnc\mf\view\AbstractView::SetAppTitle("Media Photo : Accueil");
      $v = new HomeView($publicGalleries);
      $v->makePage();
   }
}
