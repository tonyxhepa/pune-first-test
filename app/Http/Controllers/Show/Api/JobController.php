<?php

namespace App\Http\Controllers\Show\Api;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();

        return response()->json($jobs);
    }

    public function searchJobs(Request $request)
    {
        $jobs = Job::withFilters()->get();

        return response()->json($jobs);
    }

    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }
}
