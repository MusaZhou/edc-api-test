<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $fillable = ['name', 'phone', 'address', 'user_id'];
}
