<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Users;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function Showformlogin() {
        return view('authen.login');
    }

    public function Proseslogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        $user = Users::where('email', $request->input('email'))->first();
        if ($user && Hash::check($request->input('password'),$user->password)){
            Auth::login($user);

            if (Auth::user()->role == 'Admin'){
                return redirect()->intended('/category')->with('success', 'You Have Successfuly loggedin');
            }else {
                return redirect()->intended('/transaction')->with('success', 'You Have Successfuly loggedin');
            }
            }else{
                return redirect()->route('login')->with('success', 'Invalid login credentials');
            }
        }
        public function Showformregister (){
            return view('authen.register');
    
        }
        public function Prosesregister(Request $request)
        {
            $this->validate($request,[
                'name' => ['required', 'string', 'max:100'],
                'email' => ['required', 'string', 'email', 'max:255','unique:tbl_users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
    
            Users::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']), 
                'role' => 'Cashier'
            ]);
    
            return redirect(route('login'));
    
        }
        public function Logout(){
    
        }
    }


    

