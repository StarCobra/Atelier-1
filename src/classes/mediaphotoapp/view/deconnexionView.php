<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;

class DeconnexionView extends MediaphotoView implements Renderer
{
    public function render(): string
    {   
        $html = "<div>
                <h3>Voulez-vous vous déconnecter ?</h3>
                \n<form method = 'POST'>
                    \n<button>
                        \n<a href='main.php'>Annuler</a>
                    \n</button>

                    \n<input type = 'submit' name = 'submit'>
                \n</form>
              \n</div>";

        return $html;
    }
}