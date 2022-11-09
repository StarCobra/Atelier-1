<?php
namespace iutnc\mediaphotoapp\model;

class PictureTag extends \Illuminate\Database\Eloquent\Model 
{
    protected $table = 'picture_to_tag';  
    protected $primaryKey = 'id';     
    public $timestamps = false;      

}
