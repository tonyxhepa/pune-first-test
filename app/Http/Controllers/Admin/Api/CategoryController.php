<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CategoryCollection;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $cat = Category::all();

        return response()->json($cat);
    }
    public function all_categories(Request $request)
    {

        $columns = ['id', 'name', 'active', 'updated_at'];

        $length = $request->input('length');
        $column = $request->input('column'); //Index
        $dir = $request->input('dir');
        $searchValue = $request->input('search');

        $query = Category::orderBy($columns[$column], $dir);

        if ($searchValue) {
            $query->where(function($query) use ($searchValue) {
                $query->where('name', 'like', '%' . $searchValue . '%');
            });
        }

        $movies = new CategoryCollection($query->paginate($length));
        return ['data' => $movies, 'draw' => $request->input('draw')];

    }

    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->active = $request->active;
        $category->save();

        return response()->json('ok');
    }

    public function show(Category $category)
    {
        return response()->json($category);
    }

    public function update(Request $request, Category $category)
    {
        $category->update([
           'name' => $request->name,
           'active' => $request->active
        ]);

        return response()->json('ok');
    }

    public function destroy(Category $category)
    {
        $category->delete();
    }
}
