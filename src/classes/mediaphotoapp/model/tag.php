<?php
namespace iutnc\mediaphotoapp\model;

class Tag extends \Illuminate\Database\Eloquent\Model 
{
    protected $table = 'tag';  
    protected $primaryKey = 'tag_id';     
    public $timestamps = false;      

}
