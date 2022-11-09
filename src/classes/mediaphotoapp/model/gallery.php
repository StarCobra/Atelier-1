<?php
namespace iutnc\mediaphotoapp\model;

use iutnc\mediaphotoapp\model\user;

class Gallery extends \Illuminate\Database\Eloquent\Model 
{
    protected $table = 'gallery';  
    protected $primaryKey = 'gallery_id';     
    public $timestamps = true;      

    public function user(){
        return $this->belongsTo('user','user_id');
    }
    public function galleryToAccess(){
        return $this->belongsToMany('user','access_gallery_user','gallery_id','user_id');
    }
    public function galleryWhereAddPicture(){
        return $this->belongsToMany('picture','picture_to_gallery','gallery_id','picture_id');
    }
    public function galleryWhereTags(){
        return $this->belongsToMany('tag','gallery_to_tag','gallery_id','tag_id');

    }

}
