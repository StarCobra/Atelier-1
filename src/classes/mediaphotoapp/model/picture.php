<?php
namespace iutnc\mediaphotoapp\model;

class Picture extends \Illuminate\Database\Eloquent\Model 
{
    protected $table = 'picture';  
    protected $primaryKey = 'picture_id';     
    public $timestamps = false;      

}
