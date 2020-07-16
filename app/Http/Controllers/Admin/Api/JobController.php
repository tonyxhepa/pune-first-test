<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();

        return response()->json($jobs);
    }

    public function store(Request $request)
    {
        $job = new Job;
        $job->company_id = 1;
        $job->logo = 'logo';
        $job->category_id = $request->category_id;
        $job->job_type_id = $request->job_type_id;
        $job->country_id = $request->country_id;
        $job->city_id = $request->city_id;
        $job->title = $request->title;
        $job->description = $request->description;
        $job->address = $request->address;
        $job->amount = $request->amount;
        $job->currency_id = $request->currency_id;
        $job->experience_id = $request->experience_id;
        $job->cv_needed = $request->cv_needed;
        $job->active = $request->active;
        $job->save();

    }
}
