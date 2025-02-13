<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){
        return view('page.register');
    }

    public function home(request $request){
        $firstname = $request->input('firstname');
        $bio = $request->input('Bio');

        return view('page.home', ["firstname" => $firstname, "Bio" => $bio]);
    }
}