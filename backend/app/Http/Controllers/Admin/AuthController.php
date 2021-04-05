<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signin(){
    	return view("signin");
    }

    public function actionSignin(Request $request){    	
    	if(auth()->guard('admin')->attempt($request->only(["email","password"]))){
    		return redirect("/admin");
    	}
    	return back();
    }
}
