<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index(Request $request){    
    	return response()->json(News::orderBy('id','desc')->paginate(10));
    }
    
    public function logs(){    	
    	event(new \App\Events\LogEvent(rand(0,1000)));    	
    }
}