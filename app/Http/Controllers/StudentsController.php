<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{
    public function index(){
        $students = User::where('isAdmin', 0)->get();
        return view('admin.students.index',['students'=>$students]);
    }

    public function create(){
        $skills = Skill::get();
        return view('admin.students.create',['skills' => $skills]);
    }

    public function store(Request $request){
        $request->validate( [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $student = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=>Hash::make($request->password),
            'isAdmin'=> 0
        ]);

        $student->save();

        $student->skills()->attach($request->skills);

        return redirect('/students');
    }



}
