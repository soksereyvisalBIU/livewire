<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Validator;
    
class CreateUser extends Component
{

    use WithFileUploads;

    public $fullname;
    public $email;
    public $password;
    public $profile;

    public function createUser(){

        $this->validate([
            'fullname' => 'required|min:2|max:20',
            'email' => 'required|min:5|max:50|unique:users',
            'password' => 'required|min:3|max:50',
            'profile' => 'required|file'
        ]);
        
    
        User::create([
            'name' => $this->fullname,
            'email' => $this->email,
            'password' => $this->password,  
            'profile' => $this->profile->store('profile' , 'public'),
        ]);

        $users = User::class;

        
        session()->flash('success' , "Successfully!");
        $this->reset(['fullname' , 'email' , 'password' , 'profile']);
    }
    
    public function render()
    {

        $users = User::paginate(5);
        $usersCount =  User::count();        ;

        return view('livewire.create-user' , compact('users' , 'usersCount'));
    }
}
