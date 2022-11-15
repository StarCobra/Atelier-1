<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;
use iutnc\mediaphotoapp\view\MediaphotoView;

class AProposView extends MediaphotoView implements Renderer
{
    public function render(): string
    {
        $html = "<section>

                <h1>A Propos</h1>
                <p>Le lien vers le repository GitHub : <a href='https://github.com/StarCobra/Atelier-1' target='_blank'>Atelier-1</a>.</p>

                <p>Voici un lien pour télécharger le fichier .zip de nos documents de conception : <a href='https://webetu.iutnc.univ-lorraine.fr/www/zidane13u/Livrables.zip'>Document de conception</a>.</p>
                <h2>Utilisateurs normaux :</h2>
                <p>Nom : Paul Smart, Pseudo : Paulo, Adresse e-mail : paul@mediaphoto.com</p>
                <p>Nom : Gérard Menvuça, Pseudo : Gerardo, Adresse e-mail : gerard@mediaphoto.com</p>
                <p>Nom : Elsa Rose, Pseudo : Elsa, Adresse e-mail : elsa@mediaphoto.com</p>
                <h3>Galeries :</h3>
                <p>Genshin Impact, UnOrdinary, Animaux, Nature...</p>
                <h4>Tags :</h4>
                <p>#BD, #WEBTOON, #sport, #voitures...</p>
              \n</section>";

        return $html;
    }
}
