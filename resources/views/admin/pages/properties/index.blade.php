@extends('admin.layouts.admin')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            

            <div class="table-responsive">

                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Landlord</th>
                            <th>Title</th>
                            <th>Address</th>
                            <th>Bedroom and Bathroom</th>
                            <th>Image</th>
                            <th>Price</th>
                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($properties as $key => $property)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td> {{ $property->landlord->name }} </td>
                            <td> {{ $property->name }} </td>
                            <td> {{ $property->address }} </td>
                            <td> {{ $property->bedroom }} Bedromm - {{ $property->bathroom }} Bathroom </td>
                            <td> <img src="{{ asset('storage/'.$property->thumbnail) }}" width="100px"></td>
                            <td> {{ $property->price }} </td>
                         
                            <td>
             
                                <a href="{{route('admin.property.edit', $property->id)}}" class="btn btn-secondary btn-sm">Edit</a>
                                <a href="{{ route('admin.property.delete', $property->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                        @endforeach

                       
                       
                    </tbody>
                </table>


                <div>
                    {{ $properties->links() }}
                </div>
            </div>
        
        </div>

        <div>
           
        </div>



    </div>


</div>



@endSection