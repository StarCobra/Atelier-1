<?php

namespace iutnc\mediaphotoapp\model;

class AccessUser extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'access_user_gallery';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
