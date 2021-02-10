<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category', [
            'categories' => Category::all()
        ]);
    }

    public function createCategory(Request $request)
    {
        // Category::create([
        //     'name' => $request->name
        // ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return back();
    }
}
