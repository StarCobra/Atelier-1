<?php
namespace iutnc\mediaphotoapp\model;
class Gallery extends \Illuminate\Database\Eloquent\Model 
{
    protected $table = 'gallery';  
    protected $primaryKey = 'gallery_id';     
    public $timestamps = true;      

    public function user(){
        return $this->belongsTo('iutnc\mediaphotoapp\model\user','user_id');
    }
    public function galleryToAccess(){
        return $this->belongsToMany('iutnc\mediaphotoapp\model\user','access_gallery_user','gallery_id','user_id');
    }
    public function galleryPictures(){
        return $this->belongsToMany('iutnc\mediaphotoapp\model\picture','picture_to_gallery','gallery_id','picture_id');
    }
    public function galleryWhereTags(){
        return $this->belongsToMany('iutnc\mediaphotoapp\model\tag','gallery_to_tag','gallery_id','tag_id');

    }

}
