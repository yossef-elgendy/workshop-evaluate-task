<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    public function register(Request $request){
        $request->validate( [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'skills'=> 'array'
        ]);

        $student = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=>Hash::make($request->password),
            'isAdmin'=> 0
        ]);

        $student->save();

        $student->skills()->attach($request->skills);

        $token = $student->createToken('myapptoken')->plainTextToken;

        return [
            'student'=>$student,
            'token'=>$token
        ];
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return [
            'message'=>'You have logged out !!'
        ];
    }

    public function login(Request $request){
        $request->validate( [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',

        ]);

        $user = User::firstWhere('email', $request->email);

        if(!$user){
            return response([
                'message'=>'The email do not exist !!'
            ],401);
        }

        if(!Hash::check($request->password, $user->password)){
            return response([
                'message'=>'Invalid password !!'
            ],401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;
        return response( [
            'student'=>$user,
            'token'=>$token
        ] ,201);

    }

    public function index(){
        return auth()->user();
    }


}
