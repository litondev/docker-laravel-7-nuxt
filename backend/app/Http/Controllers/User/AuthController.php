<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api',[
            'except' => ['signup','signin']
        ]);
    }

    public function signup(Request $request){
    	if(User::create([
    		"username" => $request->username,
    		"email" => $request->email,
    		"password" => \Hash::make('12345678')
    	])){
    		return response()->json([
    			"message" => "success"
    		],201);
    	}

    	return response()->json([
    		"message" => "failed"
    	],500);
    }

    public function signin()
    {        
        if (! $token = auth()->attempt(request(['email', 'password']))) {
            return response()->json([
                'error' => 'Unauthorized'
            ], 401);
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function upload(Request $request){
        $old = auth()->user()->photo;

        auth()->user()->update([
            "photo" => $this->uploadImage(request()->file('photo'))
        ]);

        if($old != "default.png"){
            if(file_exists(public_path()."/images/users/".$old)){
                unlink(public_path()."/images/users/".$old);
            } 
        }

        return response()->json([
            "success" => "Success"
        ],201);
    }

    public function uploadImage($image){
        $fileName = rand(0,10000000000000).'.'.$image->getClientOriginalExtension();
        $theImage = new \Intervention\Image\ImageManager();
        $imageChange = $theImage->make($image)
        ->resize(null, 650, function($constraint){
            $constraint->aspectRatio();
        })->save(public_path() . "/images/users/"."".$fileName);        
        return $fileName;
    }
}