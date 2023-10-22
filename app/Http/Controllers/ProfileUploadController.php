<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Storage;

class ProfileUploadController extends Controller
{
    public function upload(Request $request){
        $request->validate([
          'email' => 'required|email|exists:users',
          'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:1024'
        ]);

        if($request->hasFile('image')){
            $filePath = $request->file('image')->store('profile','public');
         }

         $user = User::where('email','=',$request->email)->first();
         if(!$user){
            return \back()->with('fail','Invalid Email address');
         }else{

            Storage::disk('public')->delete($user->image);

            $user = User::where('email','=',$request->email)->update(['image' => $filePath]);
            if($user){
                return \back()->with('success','Image Uploaded successfully.');
            }else{
                return \back()->with('fail','We could not upload the image.');
            }
         }
    }
}
