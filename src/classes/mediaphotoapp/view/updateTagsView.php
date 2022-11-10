<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;

class UpdateTagsView extends MediaphotoView implements Renderer
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

        $updateGallery = $this->router->urlFor('updateGallery', [['id', $gallery->gallery_id]]);

        $html = "<div>
                \n<h3>Modifier #Tags</h3>
                \n<form action = '$updateGallery' method = 'POST'>
                    \n<label for = 'tags'> Vos #Tags : " . $tags . "</label><br>
                    \n<label for = 'tag'>Nom du #Tag</label>
                    \n<input type = 'text' name = 'tag' placeholder = '#Tag' required>

                    \n<input type = 'submit' value ='Ajouter le tag' name = 'submitTag'>
                \n</form>
                \n</div>";

        return $html;
    }
}
