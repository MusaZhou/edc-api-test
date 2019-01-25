<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Institution extends SoftDeleteModel
{
    use Sluggable;

    protected $fillable = ['name', 'phone', 'address', 'user_id'];
    protected $visible = ['name', 'address', 'phone', 'slug', 'user'];
    
    public function user(){
        return $this->belongsTo('App\Model\User')->withDefault();
    }

    public function sluggable() {
        return [
            'slug'
        ];
    }
}
