<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //
    public function index() {
        return view('hello');
    }
    public function create(){
        return view('users.register');
    }
    public function store(Request $request){
        $formField = $request->validate(
            [
                'name' => ['required','min:3'],
                'email' => ['required','email',Rule::unique('users','email')],
                'password' => ['required','confirmed','min:6'],
            ]
        );
        //hash password
        $formField['password'] = bcrypt($formField['password']);
        $user = User::create($formField);
        auth()->login($user);
        return redirect(route('listings.index'))->with('message','Register and login successfuly');
    }

    public function login(){
        return view('users.login');
    }
    public function authenticate(Request $request){
        $formField = $request->validate(
            [
                'email' => ['required','email'],
                'password' => ['required','min:6']
            ]
        );
        if(auth()->attempt($formField)){
            $request->session()->regenerate();

            return redirect(route('listings.index'))->with('message','Login successfuly');
        }
        return back()->withErrors(
            [
                'email' => "Invalid Credential"
            ]
        )->onlyInput('email');
    }
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('listings.index'))->with('message','User logout successfuly');
    }
}
