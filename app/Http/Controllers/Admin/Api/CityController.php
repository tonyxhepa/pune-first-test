<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Country $country)
    {
       $cities = $country->cities;

        return response()->json($cities);
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
