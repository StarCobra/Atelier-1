<?php
namespace iutnc\mediaphotoapp\model;

class Gallery extends \Illuminate\Database\Eloquent\Model 
{
    protected $table = 'gallery';  
    protected $primaryKey = 'gallery_id';     
    public $timestamps = true;      

}
