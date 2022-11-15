<?php

namespace iutnc\mediaphotoapp\model;

class Gallery extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'gallery';
    protected $primaryKey = 'gallery_id';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('iutnc\mediaphotoapp\model\User', 'user_id');
    }
    public function galleryToAccess()
    {
        return $this->belongsToMany('iutnc\mediaphotoapp\model\User', 'access_user_gallery', 'gallery_id', 'user_id');
    }

    public function galleryTags()
    {
        return $this->belongsToMany('iutnc\mediaphotoapp\model\Tag', 'gallery_to_tag', 'gallery_id', 'tag_id');
    }
    public function pictures()
    {
        return $this->hasMany('iutnc\mediaphotoapp\model\Picture', 'gallery_id');
    }
}
