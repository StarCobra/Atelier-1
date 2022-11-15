<?php

namespace iutnc\mediaphotoapp\model;

class Tag extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'tag';
    protected $primaryKey = 'tag_id';
    public $timestamps = false;

    public function galleryTags()
    {
        return $this->belongsToMany('iutnc\mediaphotoapp\model\Gallery', 'gallery_to_tag', 'tag_id', 'gallery_id');
    }
    public function pictureTags()
    {
        return $this->belongsToMany('iutnc\mediaphotoapp\model\Picture', 'picture_to_tag', 'tag_id', 'picture_id');
    }
}
