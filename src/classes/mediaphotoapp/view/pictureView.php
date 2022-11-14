<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;
use iutnc\mediaphotoapp\view\MediaphotoView;

class PictureView extends MediaphotoView implements Renderer
{
    public function render(): string
    {

        $prevPicture = $this->data[0];
        $picture = $this->data[1];
        $nextPicture = $this->data[2];

        $url_prevPic = $this->router->urlFor('pictureDetails', [['id', $prevPicture->picture_id]]);
        $url_nextPic = $this->router->urlFor('pictureDetails', [['id', $nextPicture->picture_id]]);

        $html = "";


        $html .= "<figure><div><img src = upload/" . $picture->file . "><nav><a href='$url_prevPic'><button>&#9664;</button></a><a href='$url_nextPic'><button>&#9654;</button></a></nav></div><figcaption>";

        $pictureTags = $picture->pictureTags()->get();
        foreach ($pictureTags as $v) {
            $html .= "<span>$v->name</span>";
        }
        $html .= "</aside></figure>";
    
        return $html;
    }
}

