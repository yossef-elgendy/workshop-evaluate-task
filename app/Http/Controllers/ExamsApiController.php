<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class ExamsApiController extends Controller
{
    public function index(){
        $exams = Exam::get();

        return response([
            'exams'=> $exams
        ],201);
    }

    public function view($exam)
    {
        $examinfo = Exam::find($exam);
        return response([
            'exam'=>$examinfo? $examinfo: 'No exam found !!'
        ],201);
    }
}
