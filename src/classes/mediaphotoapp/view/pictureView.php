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
        // echo "$prevPicture->picture_id<br>";
        // echo "$picture->picture_id<br>";
        // echo "$nextPicture->picture_id<br>";

        $url_prevPic = $this->router->urlFor('pictureDetails', [['id', $prevPicture->picture_id]]);
        $url_nextPic = $this->router->urlFor('pictureDetails', [['id', $nextPicture->picture_id]]);

        // echo $url_nextPic;
        // echo $url_prevPic;
        $html = "";


        $html .= "<figure><div><img src = upload/" . $picture->file . "><nav><a href='$url_prevPic'><button>&#9664;</button></a><a href='$url_nextPic'><button>&#9654;</button></a></nav></div><aside>#lesTags (à faire)</aside></figure>";


        return $html;
    }
}

