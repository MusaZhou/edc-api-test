<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SoftDeleteModel extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
