<?php
namespace iutnc\mediaphotoapp\model;

class Picture extends \Illuminate\Database\Eloquent\Model 
{
    protected $table = 'picture';  
    protected $primaryKey = 'picture_id';     
    public $timestamps = false;      

    public function PicturesToAdd(){
        return $this->belongsToMany('gallery','picture_to_gallery','picture_id','gallery_id');
    }
    public function pictureWhereTags(){
        return $this->belongsToMany('tag','picture_to_tag','picture_id','tag_id');

    }
}
