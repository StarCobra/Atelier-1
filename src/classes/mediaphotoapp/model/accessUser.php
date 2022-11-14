<?php

namespace iutnc\mediaphotoapp\model;

class AccessUser extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'access_gallery_user';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
