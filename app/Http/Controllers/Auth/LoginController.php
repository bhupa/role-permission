<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class LoginController extends Controller
{
    
    public function index(){
        return view('auth.login');
    }
    public function login(Request $req)
    {
       

        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        $credentials = [
            'email' => $req['email'],
            'password' => $req['password'],
        ];

        // check auth
        if (Auth::attempt($credentials)) {
            if(auth()->user()->roles()->exists()){
                return redirect()->to('/admin/dashboard');
        
            }else{
                auth()->logout();
                Session::flush();
                return redirect('/');
            }
            
        }

        //
        session()->flash('error', 'Username and password does not exists in our database');

        // return redirect
        return redirect('/');

    }

    public function logout()
    {
        auth()->logout();
        Session::flush();
        return redirect()->to('/');

    }
}
