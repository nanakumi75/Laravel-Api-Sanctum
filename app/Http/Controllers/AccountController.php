<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VerifyUser;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Session;

class AccountController extends Controller
{
    public function verify($token){
        $verifieduser = VerifyUser::where('token','=',$token)->first();
        if(isset($verifieduser)){
          $user = $verifieduser->user;
          if($user->email_verified_at == null){
            $user->email_verified_at = Carbon::now();
            $user->save();
            return \redirect()->to('/login')->with('success','Activation success. You can login now.');
          }else{
            return \redirect()->to('/login')->with('fail','You have already activated your account.');
          }
        }else{
            return \redirect()->to('/login')->with('Invalid activation code');
        }
    }

    public function login(Request $request){
        $validateData = $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        if(auth()->attempt(request()->Only(['email','password']),
         request()->filled('remember')
        )){
            return \redirect()->to('/account');
        }else{
            return \back()->with('fail','Email or Password is wrong.');
        }
    }

    public function loggedin(){
        $user = auth()->user();
        return view('account',compact('user'));
    }

    public function logout(){
        auth()->logout();
        return \redirect('/login')->with('fail','You are logged out');
    }

    public function edit(Request $request,$id){
         $user = User::find($id)->first();
         return view('edit',compact('user'));
    }

    public function saveupdates(Request $request){
        $request->validate([
           'name' => 'required|string',
           'email' => 'required|email|unique:string',
           'password' => 'required|confirmed|min:6'
        ]);

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if($user->save()){
            return \back()->with('success','Updates saved successfully.');
        }else{
            return \back()->with('fail','We could not save the changes.');
        }
    }

    public function deleteuser(){
        $user = auth()->user();
        $user->delete();
        return \redirect()->to('/register')->with('fail','Account deleted.You need to register to be a member again.');
    }

    public function passwordforget(Request $request){
          $request->validate([
            'email' => 'required|email|exists:users'
          ]);

          if(!User::where('email','=',$request->email)->first()){
            return \back()->with('fail','Invalid email address');
          }else{
            return \redirect()->to('/createnewpassword');
          }
    }

    public function createnewpassword(Request $request){
         $request->validate([
           'email' => 'required|email|exists:users',
           'password' => 'required|confirmed|min:6'
         ]);

         if(!User::where('email','=',$request->email)->first()){
            return \back()->with('fail','Invalid email address');
         }else{
            $user = User::where('email','=',$request->email)->update(['password' => Hash::make($request->password)]);
            if($user){
                return \back()->with('success','Password updated successfully. You can login now.');
            }else{
                return \back()->with('fail','We could not save the new password.');
            }
         }
    }

     
}
