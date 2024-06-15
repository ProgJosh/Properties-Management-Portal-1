<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Property;

class LandlordsController extends Controller
{
    public function landlords(){
        $landlords = Admin::where('role', '1')->paginate(10);
        return view('admin.pages.landlords', compact('landlords'));
    }

    public function SingleLandlordProperties($id){
        $properties = Property::where('landlord_id', $id)->paginate(10);

        return view('admin.pages.properties.index', compact('properties'));
    }
    
}
