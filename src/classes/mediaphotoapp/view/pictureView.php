<?php

namespace iutnc\mediaphotoapp\view;

use iutnc\mf\view\Renderer;
use iutnc\mediaphotoapp\view\MediaphotoView;

class PictureView extends MediaphotoView implements Renderer
{
    public function render(): string
    {   
        $picture=$this->data;
        
        $html = "";

        
        $html .= "<div><img src = upload/".$picture->file."></div>";
        

        return $html;
    }
}


