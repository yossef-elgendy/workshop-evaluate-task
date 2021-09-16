<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizApiController extends Controller
{


    public function related(){
        $user = auth()->user();
        $categories = array();
        foreach($user->skills as $skill){
            array_push($categories,$skill->category_id);
        }
        $quizzes = Quiz::whereIn('category_id',$categories)->get();
        return response([
            'quizzes'=> $quizzes
        ], 201);
    }

    public function index(){
        $quizzes = Quiz::get();
        return response([
            'quizzes'=> $quizzes
        ], 201);
    }
}
