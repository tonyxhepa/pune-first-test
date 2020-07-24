<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'company_id' ,
        'logo'       ,
        'category_id' ,
        'job_type_id',
        'country_id'  ,
        'city_id'     ,
        'title'       ,
        'description' ,
        'address'    ,
        'amount',
        'currency_id' ,
        'experience_id' ,
        'cv_needed' ,
        'active'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function job_type()
    {
        return $this->belongsTo(JobType::class);
    }

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }

    public function scopeWithFilters($query)
    {
        return $query->when(request()->input('category_id'), function ($query) {
            $query->where('category_id', request()->input('category_id'));
        })
            ->when(request()->input('country_id'), function ($query) {
                $query->where('country_id', request()->input('country_id'));
            })
            ->when(request()->input('city_id'), function ($query) {
                $query->where('city_id', request()->input('city_id'));
            })
            ->when(request()->input('experience_id'), function ($query) {
                $query->where('experience_id', request()->input('experience_id'));
            })
            ->when(request()->input('job_type_id'), function ($query) {
                $query->where('job_type_id', request()->input('job_type_id'));
            })
            ->when(request()->input('title'), function ($query) {
                $query->where('title','like', '%'. request()->input('title'). '%');
            });
    }
}
