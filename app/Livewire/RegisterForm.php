<?php

namespace App\Livewire;

use Livewire\Component;
use App\Mail\AccountConfirmation;
use App\Models\User;
use App\Models\VerifyUser;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterForm extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    protected $rules = [
       'name' => 'required|string',
       'email' => 'required|email|unique:users',
       'password' => 'required|confirmed|min:6'
    ];
 

    public function SubmitRegisterForm(){
        $this->validate();
        $user = new User;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->save();

        $users = new VerifyUser;
        $users->token = Str::random(60);
        $users->user_id = $user->id;
        $users->save();

        if(Mail::to($user->email)->send(new AccountConfirmation($user))){
            $this->resetInputFields();
            return \back()->with('success','Account Created. Check your email to activate your account.');
        }else{
            return \back()->with('fail','We could not create your account.');
        }
    }

    public function render()
    {
        return view('livewire.register-form');
    }

    public function resetInputFields(){
        $this->name = "";
        $this->email = "";
        $this->password = "";
        $this->password_confirmation = "";
    }
}
