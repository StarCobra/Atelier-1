<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\AbstractView;

class MediaphotoView extends AbstractView
{
    protected function makeBody(): string
    {
        return "\n<header>
                    <img src = 'html/img/Logo_mediaphoto.png' 
                         alt = 'Logo de l'application.'>
                    <form action=''>
                    <input type = 'text' name = 'recherche' placeholder = 'Recherche par #Tags'>
                    <button>Go</button>
                    </form>
                    <div>
                    <button>Connexion</button>
                    <button>Inscription</button>
                    </div>
                \n</header>

                \n<section>
                    \n<article>
                        \n" . $this->render() . "
                    \n</article>
                \n</section>

                \n<footer>
                    \n&copy; Licence Pro CIASIE 2022 | Tous droits réservés.
                    \n<a href = '#'>A propos</a>
                \n</footer>";
    }
}
