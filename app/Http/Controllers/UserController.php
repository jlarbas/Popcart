<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index', [
            'users' => User::latest()->filter(request(['search_user']))->paginate(10)
        ]);
    }

    public function show(User $user){
        return view('users.show', compact('user'));
    }

    //Register Form
    public function create(){
        return view('users.register');
    }

    public function store(Request $request){
        $form = $request->validate([
            'name' => ['required','min:3'],
            'email' => ['required','email', Rule::unique('users','email')],
            'role' => 'required',
            'contact' =>'required',
            'status' =>'required',
            'address' =>'required',
            'schedule' =>'required',
            'password' => 'required|confirmed|min:6'
        ]);

        //Hash Password
        $form['password'] = bcrypt($form['password']);

        if($request->hasFile('picture')){
            $form['picture'] = $request->file('picture')->store('users','public');
        }
        //Creates the User
        $user = User::create($form);

        //Log in the user
        // auth()->login($user);

        return redirect('/')->with('message','User created and logged in!');
    }

    public function edit(User $user){
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user){
        $form = $request->validate([
            'name' => ['required','min:3'],
            'email' => ['required','email'],
            'role' => 'required',
            'contact' =>'required',
            'status' =>'required',
            'address' =>'required',
            'schedule' =>'required',
            'password' => 'required|confirmed|min:6'
        ]);

        //Hash Password
        $form['password'] = bcrypt($form['password']);

        if($request->hasFile('picture')){
            $form['picture'] = $request->file('picture')->store('users','public');
        }
        //Creates the User
        $user->update($form);

        return back()->with('message','Updated user data successfully');
    }


    //Custom Authentication Part --------------------------------------------------------------------
    public function login(){
        return view('users.login');
    }

    public function authenticate(Request $request){
        $form = $request->validate([
            'email' => ['required','email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($form)){
            $request->session()->regenerate();
            return redirect('/')->with('message','Logged In');
        }else{
            return back()->withErrors(['email'=>'Invalid email'])->onlyInput('email ');
        }
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message','Logged out successfully');
    }


    
   
}