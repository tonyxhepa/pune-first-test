<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ExperienceCollection;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $ecps = Experience::all();

        return response()->json($ecps);
    }
    public function all_experiences(Request $request)
    {
        $columns = ['id', 'name'];

        $length = $request->input('length');
        $column = $request->input('column'); //Index
        $dir = $request->input('dir');
        $searchValue = $request->input('search');

        $query = Experience::orderBy($columns[$column], $dir);

        if ($searchValue) {
            $query->where(function($query) use ($searchValue) {
                $query->where('name', 'like', '%' . $searchValue . '%');
            });
        }

        $countries = new ExperienceCollection($query->paginate($length));
        return ['data' => $countries, 'draw' => $request->input('draw')];
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
