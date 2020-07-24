<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CityCollection;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return response()->json($cities);
    }
    public function all_cities(Request $request, Country $country)
    {
        $columns = ['id', 'name'];

        $length = $request->input('length');
        $column = $request->input('column'); //Index
        $dir = $request->input('dir');
        $searchValue = $request->input('search');

        $query = City::where('country_id', $country->id)->orderBy($columns[$column], $dir);

        if ($searchValue) {
            $query->where(function($query) use ($searchValue) {
                $query->where('name', 'like', '%' . $searchValue . '%');
            });
        }

        $countries = new CityCollection($query->paginate($length));
        return ['data' => $countries, 'draw' => $request->input('draw')];
    }

    public function store(Request $request, Country $country)
    {
        $city = new City;
        $city->country_id = $country->id;
        $city->name = $request->name;
        $city->save();

        return response()->json('ok');
    }

    public function show(Country $country, City $city)
    {
        return response()->json($city);
    }

    public function update(Request $request, Country $country, City $city)
    {
        $city->update([
            'name' => $request->name,
        ]);

        return response()->json('ok');
    }

    public function destroy(Country $country, City $city)
    {
        $city->delete();
    }
}
