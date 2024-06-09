<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function register(RegisterRequest $request){
    $input = $request->validated();
    $input['password'] = bcrypt($input['password']);
    $user=User::create($input);
    $token = $user->createToken('MyApp')->accessToken;
    return response()->json(['message'=>'User has been created','token' => $token,'user'=>$user],201);
  }
  
  public function login(Request $request)
  {
    if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
      $user = Auth::user();
      $success['token'] =  $user->createToken('MyApp')-> accessToken;
      $success['name'] =  $user->name;
      
      return Response()->json($success);
    }
    else{
      return Response()->json(["error" => "Unauthorized"], 401);
    }
  }
}
