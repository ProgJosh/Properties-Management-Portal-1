<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class HomeController extends Controller
{
    public function index()
    {

        $properties = Property::latest()->take(6)->get();

        return view('frontend.pages.home', compact('properties'));
    }


    public function properties()
    {
        // Validate the request parameters
        request()->validate([
            'location' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'accommodation' => 'nullable|integer|min:0',
        ]);
    
        // Start the query
        $query = Property::query();
    
        // Apply location filter if it exists
        if (request()->has('location') && request('location') !== 'all') {
            $location = request('location');
            $query->whereRaw('location REGEXP ?', [$location]);
        }

        if(request()->has('keyword') && !empty(request('keyword'))){
            $query->whereRaw('name REGEXP ?', [request('keyword')]);
        }

        
        // Apply type filter if it exists
        if (request()->has('type') && request('type') !== 'all') {
            $query->where('type', request('type'));
        }
    
        // Apply accommodation filter if it exists
        if (request()->has('accommodation')) {
            $query->where('accommodation', '>', request('accommodation'));
        }
    
        // Paginate the results
        $properties = $query->latest()->paginate(10); // Adjust the number as needed
    
        // Return the view with the properties
        return view('frontend.pages.properties', compact('properties'));
    }
    


    public function property($id)
    {
        $property = Property::find($id);
        return view('frontend.pages.property-details', compact('property'));
    }


    public function propertyByType($type)
    {
        // Sanitize the type if necessary
        $type = htmlspecialchars($type);
    
        // Retrieve properties of the given type with pagination
        $properties = Property::where('type', $type)->paginate(12);
    
        // Pass the properties and type to the view
        return view('frontend.pages.properties', compact('properties', 'type'));
    }
    
}
