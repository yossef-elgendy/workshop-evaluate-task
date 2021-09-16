<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function create(Quiz $quiz){

        return view('admin.quizzes.questions.create', ['quiz'=>$quiz]);
    }


    public function store(Quiz $quiz,Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:200',
            'choice'=>'required|array|min:2',
            'choice.*'=>'max:100',
            'isRight'=>'required|array|min:1|max:1'
        ]);

        $question = Question::create([
            'question' => $request->question,
            'quiz_id' => $quiz->id
        ]);

        foreach($request->choice as $key => $choice){
            if($choice !== null){
                $choiceArray = [
                    'choice'=>$choice,
                    'question_id'=>$question->id,
                    'isRight'=> array_key_exists($key, $request->isRight)? true: false
                ];
                Choice::create($choiceArray);
            }

        }



        return redirect()->back()->with('success', 'Question has been created !!');


    }
}
