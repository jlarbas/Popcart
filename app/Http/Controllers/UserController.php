<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Restaurant;
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
        $roles = Role::all();
        $restaurants = Restaurant::all();
        return view('users.register',['restaurants'=>$restaurants,'roles'=>$roles]);
    }

    public function store(Request $request){
        
        $request->validate([
            'name' => ['required','min:3'],
            'email' => ['required','email', Rule::unique('users','email')],
            'password' => 'required|confirmed|min:6',
            'contact' => ['required','max:11'],
        ]);
        
        $data = new User();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->restaurant_id = $request->input('restaurant_id');
        $data->contact = $request->input('contact');
        $data->role_id = $request->input('role_id');
        $data->status = $request->input('status');
        $data->address = $request->input('address');
        $data->schedule = $request->input('schedule');
        $data->password =  bcrypt($request->input('password'));
        //Hash Password
        if($request->hasFile('picture')){
            $data->picture = $request->file('picture')->store('users','public');
        }
        //Creates the User
        $data->save();

        //Log in the user
        // auth()->login($user);

        return redirect('/')->with('message','User created!');
    }

    public function edit(User $user){
        $restaurants = Restaurant::all();
        return view('users.edit', ['user' => $user,'restaurants' => $restaurants]);
    }

    public function update(Request $request, User $user){
        $form = $request->validate([
            'name' => ['required','min:3'],
            'email' => ['required','email'],
            'role' => 'required',
            'contact' =>['required','max:11'],
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
            
            $type = auth()->user()->role_id; 
            switch ($type) {
                case 1:
                   
                    $request->session()->regenerate();
                    return redirect('/')->with('message','Logged In');
                    break;
                case 2:
                    
                    $request->session()->regenerate();
                    return redirect()->route('staffIndex')->with('message','Logged In');
                    break; 
                case 3:
                    $request->session()->regenerate();
                    return redirect()->route('staffIndex')->with('message','Logged In');
                    break;
                default:
                return redirect('/');
                    break;
            }
            
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