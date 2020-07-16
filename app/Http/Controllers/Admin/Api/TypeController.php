<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\JobType;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = JobType::all();

        return response()->json($types);
    }

    public function store(Request $request)
    {
        $type = new JobType;
        $type->name = $request->name;
        $type->active = $request->active;
        $type->save();

        return response()->json('ok');
    }

    public function show(JobType $type)
    {
        return response()->json($type);
    }

    public function update(Request $request, JobType $type)
    {
        $type->update([
            'name' => $request->name,
            'active' => $request->active,
        ]);

        return response()->json('ok');
    }

    public function destroy(JobType $type)
    {
        $type->delete();
    }
}
