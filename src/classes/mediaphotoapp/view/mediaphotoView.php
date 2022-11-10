<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\AbstractView;

class MediaphotoView extends AbstractView
{
    protected function makeBody(): string
    {
        $url_connexion = $this->router->urlFor('connexion');
        $url_deconnexion = $this->router->urlFor('deconnexion');
        $url_inscription = $this->router->urlFor('inscription');

        return "\n<header>
                    \n<a href = 'main.php'>
                        \n<img src = 'html/img/Logo_mediaphoto.png' alt = 'Logo de l'application.'>
                    \n</a>
                    \n<form action = ''>
                      \n<input type = 'text' name = 'recherche' placeholder = 'Recherche par #Tags'>
                      \n<button>Go</button>
                    \n</form>
                    \n<div>
                      \n<button>
                          \n<a href = '$url_connexion'>Connexion</a>
                      \n</button>
                      \n<button>
                          \n<a href = '$url_deconnexion'>Déconnexion</a>
                      \n</button>
                      \n<button>
                          \n<a href = '$url_inscription'>Inscription</a>
                      \n</button>
                      \n<button>
                          \n<a href = '#'>Profil</a>
                      \n</button>
                    \n</div>
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
