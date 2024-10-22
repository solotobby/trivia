<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){
        
        $AuthUser= Auth::user();
        if($AuthUser->hasRole('admin')){
            return redirect()->route('admin.home');
        }else{
            return redirect()->route('user.dashboard');
        }
       
    }

    public function adminHome(){
        return view('admin.home');
    }

    public function userDashboard(){
       return view('user.dashboard');
    }
}
