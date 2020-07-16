<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();

        return response()->json($countries);
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
