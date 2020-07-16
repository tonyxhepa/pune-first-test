<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
      'title',
      'logo',
        'address',
        'description',
        'amount',
        'cv_needed',
        'active'
    ];
}
