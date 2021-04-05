<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
    	echo "<a href='".url('/admin/logout')."'>Keluar</a>";    	
    	echo "<br/>";
    	return "hai admin";
    }

    public function logout(){
    	auth()->guard('admin')->logout();
    	return redirect("/signin");
    }
}
