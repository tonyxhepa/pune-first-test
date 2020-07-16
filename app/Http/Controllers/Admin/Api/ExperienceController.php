<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::all();

        return response()->json($experiences);
    }

    public function store(Request $request)
    {
        $experience = new Experience;
        $experience->name = $request->name;
        $experience->save();

        return response()->json('ok');
    }

    public function show(Experience $experience)
    {
        return response()->json($experience);
    }

    public function update(Request $request, Experience $experience)
    {
        $experience->update([
            'name' => $request->name,
        ]);

        return response()->json('ok');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
    }
}
