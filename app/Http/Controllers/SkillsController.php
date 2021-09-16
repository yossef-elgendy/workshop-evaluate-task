<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Category;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function index(){
        $skills = Skill::get();
        return view('admin.skills.index', ['skills'=>$skills]);
    }

    public function create(){
        $categories = Category::get();

        return view('admin.skills.create', ['categories'=> $categories]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'skill'=>'required|max:30',
            'category_id'=> 'required|numeric'
        ]);
        $skill = Skill::create($validated);
        return redirect('/skills');
    }
}
