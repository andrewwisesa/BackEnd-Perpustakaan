<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function registerProses(Request $request){
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'phone' => 'max:12', 
            'addres' => 'required',
        ]);
        
        
        $request['password'] = Hash::make($request->password);
        $user = User::create($request->all());

        Session()->flash('status', 'succes');
        Session()->flash('massage', 'Register succes, Wait admin for Approval');
        return redirect('register');
}
}
