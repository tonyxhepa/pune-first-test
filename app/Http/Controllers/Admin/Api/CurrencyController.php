<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currency::all();

        return response()->json($currencies);
    }

    public function store(Request $request)
    {
        $currency = new Currency;
        $currency->name = $request->name;
        $currency->save();

        return response()->json('ok');
    }

    public function show(Currency $currency)
    {
        return response()->json($currency);
    }

    public function update(Request $request, Currency $currency)
    {
        $currency->update([
            'name' => $request->name,
        ]);

        return response()->json('ok');
    }

    public function destroy(Currency $currency)
    {
        $currency->delete();
    }
}
