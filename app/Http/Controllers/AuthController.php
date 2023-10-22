<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //user Registration functions
    public function register(Request $request){
      $fields = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed|min:6'
      ]);

      $user = User::create([
        'name' => $fields['name'],
        'email' => $fields['email'],
        'password' => Hash::make($fields['password'])
      ]);
  
      $token = $user->createToken('myapptoken')->plainTextToken;

      $response = [
         'user' => $user,
         'token' => $token,
         'type' => 'bearer'
      ];
 
      return response($response,201);
    }

public function login(Request $request){
    $fields = $request->validate([
        'email' => 'required|email|exists:users',
        'password' => 'required'
    ]);

    $user = User::where('email','=',$fields['email'])->first();
    if(!$user || !(Hash::check($fields['password'],$user->password))){
        return response([
            'message' => 'Email or password is wrong'
        ],404);
    }else{

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
          'user' => $user,
          'token' => $token,
          'type' => 'bearer'
        ];

        return response($response,200);
    }


}

public function logout(){
    return auth()->user()->tokens()->delete();
}

    //Employee account functions 
    public function store(Request $request){
      $fields = $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'email' => 'required|email|unique:employees',
        'position' => 'required|string',
        'city' => 'required|string'
      ]);

      return Employee::create($request->all());
    }

    public function index(Request $request){
        return Employee::all();
    }

    public function show(Request $request,$id){
        return Employee::find($id);
    }

    public function update(Request $request,$id){
        return Employee::find($id)->update($request->all());
    }

    public function search(Request $request,$name){
        return Employee::where('first_name','LIKE','%'.$name.'%')
        ->OrWhere('last_name','LIKE','%'.$name.'%')
        ->OrWhere('email','LIKE','%'.$name.'%')
        ->OrWhere('position','LIKE','%'.$name.'%')
        ->OrWhere('city','LIKE','%'.$name.'%')
        ->get();
    }

    public function destroy($id){
         Employee::find($id)->delete();

         return response([
           'message' => 'Employee deleted'
         ]);
    }
}
