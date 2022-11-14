<?php
namespace iutnc\mediaphotoapp\model;
class User extends \Illuminate\Database\Eloquent\Model 
{
    protected $table = 'user';  
    protected $primaryKey = 'user_id';     
    public $timestamps = false;      

    public function galleries(){
        return $this->hasMany('iutnc\mediaphotoapp\model\gallery','user_id');
    }
    public function galleriesAccess(){
        return $this->belongsToMany('iutnc\mediaphotoapp\model\gallery','access_user_gallery','user_id','gallery_id');
    }
}
