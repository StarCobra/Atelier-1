<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mediaphotoapp\view\AProposView;
use iutnc\mf\control\AbstractController;

class AProposController extends AbstractController
{
    public function execute(): void
    {

        \iutnc\mf\view\AbstractView::SetAppTitle("Media Photo : À Propos");
        $v = new AProposView();
        $v->makePage();
    }
}
