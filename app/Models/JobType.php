<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'active'];
}
