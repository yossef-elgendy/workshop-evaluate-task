<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){

        $categories = Category::where('parent_id',null)->get();


        return view('admin.categories.index',['categories'=> $categories]);

    }

    public function create(){

        $categories = Category::get();

        return view('admin.categories.create', ['categories'=> $categories]);
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name'=>'required|max:30',
            'parent_id'=> 'nullable|numeric'
        ]);
        $category = Category::create($validated);
        return redirect('/categories');
    }

}
