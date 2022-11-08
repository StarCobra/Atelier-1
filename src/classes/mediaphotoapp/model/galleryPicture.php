<?php
namespace iutnc\mediaphotoapp\model;

class GalleryPicture extends \Illuminate\Database\Eloquent\Model 
{
    protected $table = 'picture_to_gallery';  
    protected $primaryKey ='id';     
    public $timestamps = false;      

}
