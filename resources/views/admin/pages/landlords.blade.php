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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Total Properties</th>
                    
                            <th>Balance</th>
                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($landlords as $key => $landlord ) 
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td> {{ $landlord->name }} </td>
                            <td> {{ $landlord->email }} </td>
                            <td> {{ $landlord->phone }} </td>
                            <td> <a href="{{ route('admin.single.landlord', $landlord->id)}}">{{ $landlord->properties->count()  }} </a></td>
                          
                            <td>   </td>
                         
                            <td>
             
                                <a href=" " class="btn btn-secondary btn-sm">Edit</a>
                                <a href=" " class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                        @endforeach

                       
                       
                    </tbody>
                </table>


                <div>
                    {{ $landlords->links() }}
                </div>
            </div>
        
        </div>

        <div>
           
        </div>



    </div>


</div>



@endSection