<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Category;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizzesController extends Controller
{
    public function index(){
        $quizzes = Quiz::get();
        return view('admin.quizzes.index', ['quizzes'=>$quizzes]);
    }

    public function create(){
        $categories = Category::get();
        return view('admin.quizzes.create',['categories'=>$categories]);
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'title'=>'required|max:80',
            'duration'=>'required|numeric',
            'category_id'=>'required|numeric',
            'level'=>'required|string',
            'price'=>'required|numeric',
            'photo' => 'required|image|max:2048',

           ]);


        $name = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('images'), $name);

        $save = new Photo;
        $save->title = $name;
        $save->src = 'images/'.$name;
        $save->save();

        $quiz = Quiz::create([
            'title'=>$request->title,
            'duration'=>$request->duration,
            'category_id'=>$request->category_id,
            'description'=>$request->description,
            'level'=>$request->level,
            'price'=>$request->price,
            'photo_id'=>$save->id
        ]);


        return redirect('/quizzes');
    }

    public function view(Quiz $quiz){
        $questions = $quiz->questions ;
        return view('admin.quizzes.questions.index', ['questions'=>$questions, 'quiz'=>$quiz]);

    }

}
