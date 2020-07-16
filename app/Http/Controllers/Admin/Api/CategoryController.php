<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return response()->json($categories);
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
