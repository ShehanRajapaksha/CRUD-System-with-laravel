<?php

namespace App\Http\Controllers;

use App\Models\InviteLink;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ListerRegisterController extends Controller
{
    public function register($link)
    {
        $inviteLink = InviteLink::where('link', $link)->first();

        if (!$inviteLink) {
            abort(404); 
        }
    
        // return view('auth.listerregister');
        return view('auth.listerregister');
    }

    public function registersave(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|confirmed'


        ]);
        $data= $request->all();
        $check=$this->create($data);
        

        return redirect()->intended('/dashboard');
    }

    public function create(array $data)
    {
        $user= User::create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'password'=>Hash::make($data['password'])

        ]);
         $user->assignRole('lister');
         Auth::login($user);
        
         

    }
}
