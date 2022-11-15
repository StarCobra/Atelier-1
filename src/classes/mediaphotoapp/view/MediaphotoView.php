<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\AbstractView;
use iutnc\mediaphotoapp\auth\mediaphotoAuthentification;

class MediaphotoView extends AbstractView
{
    protected function makeBody(): string
    {
        $id =  mediaphotoAuthentification::connectedUser();
        $url_connexion = $this->router->urlFor('connexion');
        $url_deconnexion = $this->router->urlFor('deconnexion');
        $url_inscription = $this->router->urlFor('inscription');
        $url_creator = $this->router->urlFor('user', [['id', $id]]);
        $url_search = $this->router->urlFor('searchTag');
        $url_deleteAccount = $this->router->urlFor('DeleteAccount', [['id', $id]]);
        $url_propos = $this->router->urlFor('propos');

        if ($id === null) {

            return "\n<header>
                    \n<a href = './'>
                        \n<img src = 'html/img/Logo_mediaphoto.png' alt = 'Logo de l'application.'>
                    \n</a>
                    \n<form action = '$url_search' method = 'POST'>
                      \n<input type = 'text' name = 'recherche' placeholder = 'Recherche par #Tags'>
                      \n<button><svg fill='#ffffff' xmlns='http://www.w3.org/2000/svg'  viewBox='0 0 50 50' width='22px' height='22px'><path d='M 21 3 C 11.601563 3 4 10.601563 4 20 C 4 29.398438 11.601563 37 21 37 C 24.355469 37 27.460938 36.015625 30.09375 34.34375 L 42.375 46.625 L 46.625 42.375 L 34.5 30.28125 C 36.679688 27.421875 38 23.878906 38 20 C 38 10.601563 30.398438 3 21 3 Z M 21 7 C 28.199219 7 34 12.800781 34 20 C 34 27.199219 28.199219 33 21 33 C 13.800781 33 8 27.199219 8 20 C 8 12.800781 13.800781 7 21 7 Z'/></svg></button>
                    \n</form>
                    \n<nav>
                      \n<div>☰</div>
                      \n<ul>
                      \n<li><a href = '$url_connexion'><button>Connexion</button></a></li>
                      \n<li><a href = '$url_inscription'><button>Inscription</button></a></li>
                      \n<li><a href = '$url_propos'><button>A propos</button></a></li>
                      \n</ul>
                    \n</nav>
                \n</header>

                \n<main>
                    \n" . $this->render() . "
                \n</main>

                \n<footer>
                    \n&copy; Licence Pro CIASIE 2022 | Tous droits réservés.
                \n</footer>";
        } else {
            $url_auth_user = $this->router->urlFor('authentificateHome', [['id', $id]]);

            return "\n<header>
        \n<a href = '$url_auth_user'>
            \n<img src = 'html/img/Logo_mediaphoto.png' alt = 'Logo de l'application.'>
        \n</a>
        \n<form action = '$url_search'>
          \n<input type = 'text' name = 'recherche' placeholder = 'Recherche par #Tags'>
          \n<button><svg fill='#ffffff' xmlns='http://www.w3.org/2000/svg'  viewBox='0 0 50 50' width='22px' height='22px'><path d='M 21 3 C 11.601563 3 4 10.601563 4 20 C 4 29.398438 11.601563 37 21 37 C 24.355469 37 27.460938 36.015625 30.09375 34.34375 L 42.375 46.625 L 46.625 42.375 L 34.5 30.28125 C 36.679688 27.421875 38 23.878906 38 20 C 38 10.601563 30.398438 3 21 3 Z M 21 7 C 28.199219 7 34 12.800781 34 20 C 34 27.199219 28.199219 33 21 33 C 13.800781 33 8 27.199219 8 20 C 8 12.800781 13.800781 7 21 7 Z'/></svg></button>
        \n</form>
        \n<nav>
          \n<div>☰</div>
          \n<ul>
          \n<li><a href = '$url_deconnexion'><button>Déconnexion</button></a></li>
          \n<li><a href = '$url_creator'><button>Profil</button></a></li>
          \n<li><a href = '$url_deleteAccount'><button>Supprimer Compte</button></a></li>
          \n<li><a href = '$url_propos'><button>A propos</button></a></li>
          \n</ul>
        \n</nav>
    \n</header>

    \n<main>
        \n" . $this->render() . "
    \n</main>

    \n<footer>
        \n&copy; Licence Pro CIASIE 2022 | Tous droits réservés.
    \n</footer>";
        }
    }
}
