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
use App\Models\Booking;
use App\Models\Payment;

use App\Models\Property;



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

    public function login(Request $request){
      
        $data = $request->only('email', 'password');


        if(Auth::guard('admin')->attempt($data)){
            return redirect()->route('admin.dashboard');
        }

    
        Toastr::error('Invalid Credentials');
        return redirect()->back();
    }


    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function dashboard(){

        if(Auth::user()->role == '0'){
            $tatalProperty = Property::count();
            $totalBooked = Booking::count();
            $totalAmount = Payment::sum('amount');
            $revenue = $totalAmount * 0.10;
            
        }else{
            $lanlordid = Auth::user()->id;
    
            $properyByLanlord = Property::where('landlord_id', $lanlordid)->get();


            $tatalProperty = $properyByLanlord->count();
            $totalBooked = Booking::query()
                        ->whereIn('property_id', $properyByLanlord->pluck('id'))
                        ->count(); 



        $totalAmount = Payment::query()
                    ->whereIn('booking_id', $properyByLanlord->pluck('id'))
                    ->sum('amount');

        $revenue = $totalAmount - ($totalAmount * 0.10);
        };

        
     

        return view('admin.pages.dashboard', compact('tatalProperty', 'totalBooked', 'totalAmount', 'revenue'));
    }
}
