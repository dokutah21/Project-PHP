<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function login(){
        return view('user.login');
    }

    public function register(){
        return view('user.register');
    }

    public function postRegister(Request $req){
        $req->merge(['password'=> Hash::make($req->password)]);

        try{
            User::create($req->all());
        }
        catch(\Throwable $th){
            dd($th);
        }
        return redirect()->route('login');
    }

    public function postLogin(Request $req){

       // dd($req->all());

        try{
           // User::create($req->all());
           return redirect("admin");
        }catch(\Throwable $th){
            dd($th);
        }
        return redirect()->route('login');
        
        // if(Auth::attempt(['email' => $req->email, 'password' => $req->password])){
        //     return redirect()->route('user.index');
        // }
        // return redirect()->back() -> with('error', 'Sai cái gì đó.');
    }
}
