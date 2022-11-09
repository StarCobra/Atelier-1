<?php
namespace iutnc\mediaphotoapp\model;

use iutnc\mediaphotoapp\model\gallery;

class User extends \Illuminate\Database\Eloquent\Model 
{
    protected $table = 'user';  
    protected $primaryKey = 'user_id';     
    public $timestamps = false;      

    public function galleries(){
        return $this->hasMany('gallery','user_id');
    }
    public function usersHasAccess(){
        return $this->belongsToMany('gallery','access_gallery_user','user_id','gallery_id');
    }
}
