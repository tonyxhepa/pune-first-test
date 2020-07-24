<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\JobCollection;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $columns = ['id', 'title'];

        $length = $request->input('length');
        $column = $request->input('column'); //Index
        $dir = $request->input('dir');
        $searchValue = $request->input('search');

        $query = Job::orderBy($columns[$column], $dir);

        if ($searchValue) {
            $query->where(function($query) use ($searchValue) {
                $query->where('title', 'like', '%' . $searchValue . '%');
            });
        }

        $countries = new JobCollection($query->paginate($length));
        return ['data' => $countries, 'draw' => $request->input('draw')];
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

    public function show($id)
    {
        $job = Job::findOrFail($id);

        return response()->json($job);
    }

    public function update(Request $request, Job $job)
    {

        $job->update([
           'company_id' => 1,
           'logo'       => 'logo',
           'category_id' => $request->category_id,
           'job_type_id' => $request->job_type_id,
           'country_id'  => $request->country_id,
           'city_id'     => $request->city_id,
           'title'       => $request->title,
           'description' => $request->description,
            'address'    => $request->address,
            'amount' => $request->amount,
            'currency_id' => $request->currency_id,
            'experience_id' => $request->experience_id,
            'cv_needed' => $request->cv_needed,
             'active' => $request->active
        ]);

    }

    public function destroy(Job $job)
    {
        $job->delete();
    }
}
