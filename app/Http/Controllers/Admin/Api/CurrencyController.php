<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CurrencyCollection;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        $cur = Currency::all();

        return response()->json($cur);
    }
    public function all_currencies(Request $request)
    {
        $columns = ['id', 'name'];

        $length = $request->input('length');
        $column = $request->input('column'); //Index
        $dir = $request->input('dir');
        $searchValue = $request->input('search');

        $query = Currency::orderBy($columns[$column], $dir);

        if ($searchValue) {
            $query->where(function($query) use ($searchValue) {
                $query->where('name', 'like', '%' . $searchValue . '%');
            });
        }

        $countries = new CurrencyCollection($query->paginate($length));
        return ['data' => $countries, 'draw' => $request->input('draw')];
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
