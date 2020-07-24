<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CountryCollection;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $ct = Country::all();

        return response()->json($ct);
    }
    public function all_countries(Request $request)
    {
        $columns = ['id', 'name'];

        $length = $request->input('length');
        $column = $request->input('column'); //Index
        $dir = $request->input('dir');
        $searchValue = $request->input('search');

        $query = Country::orderBy($columns[$column], $dir);

        if ($searchValue) {
            $query->where(function($query) use ($searchValue) {
                $query->where('name', 'like', '%' . $searchValue . '%');
            });
        }

        $countries = new CountryCollection($query->paginate($length));
        return ['data' => $countries, 'draw' => $request->input('draw')];
    }

    public function store(Request $request)
    {
        $country = new Country;
        $country->name = $request->name;
        $country->save();

        return response()->json('ok');
    }

    public function show(Country $country)
    {
        return response()->json($country);
    }

    public function update(Request $request, Country $country)
    {
        $country->update([
            'name' => $request->name,
        ]);

        return response()->json('ok');
    }

    public function destroy(Country $country)
    {
        $country->delete();
    }
}
