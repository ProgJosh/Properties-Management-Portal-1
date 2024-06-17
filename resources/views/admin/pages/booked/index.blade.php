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
                            <th>Property</th>
                            <th>Tenant Name</th>
                            <th>Checkin</th>
                            <th>Checkout</th>   
                            <th>Contact</th>
                            <th>Booking date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                      

                        @foreach ($booked as $key => $book)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td> 

                                <a href="{{ route('admin.property.show', $book->property_id)}}"> {{  $book->property->name }}  </a>
                                
                                
                                



                            </td>
                            <td> {{ $book->user->name }} </td>
                            <td> {{ $book->checkin }} </td>
                            <td> {{ $book->checkout }} </td>
                            <td>  {{ @$book->phone }} </td>
                            
                            <td> {{ $book->created_at }} </td>
                            <td>
             
                                <a href="{{ route('admin.booked.show', $book->id)}}" class="btn btn-primary btn-sm">Details</a>
                                
                            </td>
                        </tr>
                        @endforeach

                       
                       
                    </tbody>
                </table>


                <div>
                    {{ $booked->links() }}
                </div>
            </div>
        
        </div>

        <div>
           
        </div>



    </div>


</div>


@endsection