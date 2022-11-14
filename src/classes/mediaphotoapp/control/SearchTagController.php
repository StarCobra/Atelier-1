<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mediaphotoapp\model\Tag;
use iutnc\mf\control\AbstractController;
use iutnc\mediaphotoapp\view\SearchTagView;

class SearchTagController extends AbstractController
{
    public function execute(): void
    {
        \iutnc\mf\view\AbstractView::SetAppTitle("Media Photo : Galerie Recherchée");
    
        $searchTag = $_POST['recherche'];

        $tags = Tag::where('name', '=', $searchTag)->get();
        $h = [];
        foreach ($tags as $v) {
         
            $gallery = $v->galleryTags()->where('status', '=', '0')->get();
            array_push($h,$gallery);
        }
        $v = new SearchTagView($h);
        $v->makePage();
    }
}
