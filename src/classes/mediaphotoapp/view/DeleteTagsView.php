<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;

class DeleteTagsView extends MediaphotoView implements Renderer
{
    public function render(): string
    {
        $gallery = $this->data;
        $html = "";
        $tags = "";
        $tag = $gallery->galleryTags()->get();
        for ($i = 0; $i < count($tag); $i++) {
            $tags .= $tag[$i]->name;
            if ($i < count($tag) - 1) $tags .= ", ";
        }

        $suppTags = $this->router->urlFor('deleteTags', [['id', $gallery->gallery_id]]);

        $html = "<section>
                \n<h2>Supprimer #Tags</h2>
                \n<form action = '$suppTags' method = 'POST'>
                    \n<label for = 'tags'> Vos #Tags : " . $tags . "</label><br>
                    \n<label for = 'tag'>Nom du #Tag</label>
                    \n<input type = 'text' name = 'tag' placeholder = '#Tag' required>";
        if (isset($_POST["submitErase"])) {
            if (mb_substr($_POST["tag"], 0, 1) !== "#") {
                $html2 = "\n<p>Votre tag doit commencer par un # !</p>\n<input type = 'submit' value ='Supprimer le tag' name = 'submitErase'>
                \n</form>
                \n</section>";
            } else {
                $html2 =  "\n<input type = 'submit' value ='Supprimer le tag' name = 'submitErase'>
                \n</form>
                \n</section>";
                for ($i = 0; $i < count($tag); $i++) {
                    if ($tag[$i]->name !== $_POST["tag"]) {
                        $html2 = "\n<p>Ce tag n'existe pas !</p>\n<input type = 'submit' value ='Supprimer le tag' name = 'submitErase'>
                        \n</form>
                        \n</section>";
                    }
                }
            }
        } else {
            $html2 =  "\n<input type = 'submit' value ='Supprimer le tag' name = 'submitErase'>
                \n</form>
                \n</section>";
        }
        return $html . $html2;
    }
}
