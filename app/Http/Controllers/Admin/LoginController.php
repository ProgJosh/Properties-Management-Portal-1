<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAdminRequest;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Brian2694\Toastr\Facades\Toastr;

class LoginController extends Controller
{
    public function showLoginForm(){

        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }

        return view ('admin.pages.auth.login');
    }


    public function showRegistrationForm(){
        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }
        return view ('admin.pages.auth.register');
    }

    public function register(StoreAdminRequest $request){
        
        $data = $request->all();

       
        $data['password'] = bcrypt($data['password']);
        $admin = Admin::create($data);
      
        Auth::guard('admin')->login($admin);
      
     

        Toastr::success('Registration Successfull');


        return redirect()->route('admin.dashboard');
    }

    public function dashboard(){
        return view('admin.pages.dashboard');
    }
}
