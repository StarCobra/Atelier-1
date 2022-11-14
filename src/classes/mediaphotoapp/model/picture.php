<?php
namespace iutnc\mediaphotoapp\model;

class Picture extends \Illuminate\Database\Eloquent\Model 
{
    protected $table = 'picture';  
    protected $primaryKey = 'picture_id';     
    public $timestamps = false;      

    public function pictureTags(){
        return $this->belongsToMany('iutnc\mediaphotoapp\model\tag','picture_to_tag','picture_id','tag_id');

    }
    public function gallery(){
        return $this->belongsTo('iutnc\mediaphotoapp\model\gallery','gallery_id');
    }
}
