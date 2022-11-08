<?php
namespace iutnc\mediaphotoapp\model;

class GalleryTag extends \Illuminate\Database\Eloquent\Model 
{
    protected $table = 'gallery_to_tag';  
    protected $primaryKey = 'id';     
    public $timestamps = false;      

}
