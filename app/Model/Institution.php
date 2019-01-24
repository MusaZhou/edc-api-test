<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $fillable = ['name', 'phone', 'address', 'user_id'];

    public function user(){
        return $this->belongsTo('App\Model\User')->withDefault();
    }
}
