<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;
use iutnc\mediaphotoapp\view\MediaphotoView;

class PictureView extends MediaphotoView implements Renderer
{
    public function render(): string
    {
        $picture = $this->data;

        $pictureTags = $picture->pictureTags()->get();

        $html = "<figure><div><img src = upload/" . $picture->file . "><nav><a href=''><button>&#9664;</button></a><a href=''><button>&#9654;</button></a></nav></div><aside>";
        foreach ($pictureTags as $v) {
            $html .= "<span>$v->name</span>";
        }
        $html .= "</aside></figure>";

        return $html;
    }
}
