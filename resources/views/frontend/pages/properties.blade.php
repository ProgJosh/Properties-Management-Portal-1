@extends('frontend.layouts.frontend')

@section('content')
    <!-- ==================== Breadcrumb Start Here ==================== -->
    <section class="breadcrumb padding-y-120">
        <img src="{{ asset('frontend/assets/images/thumbs/breadcrumb-img.png') }}" alt="" class="breadcrumb__img">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb__wrapper">
                        <h2 class="breadcrumb__title"> Property</h2>
                        <ul class="breadcrumb__list">
                            <li class="breadcrumb__item"><a href="{{ url('/') }}" class="breadcrumb__link"> <i
                                        class="las la-home"></i> Home</a> </li>
                            <li class="breadcrumb__item"><i class="fas fa-angle-right"></i></li>
                            <li class="breadcrumb__item"> <span class="breadcrumb__item-text"> Properties </span> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==================== Breadcrumb End Here ==================== -->

    <!-- ======================== Property Section Start ============================ -->
    <section class="property bg-gray-100 padding-y-120">
        <div class="container container-two">



            
            <div class="property-filter">
                <form action="#" method="GET">
                    <div class="row gy-4">
                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                            <label for="location">Location</label>
                            <div class="select-has-icon">
                                
                                <select class="form-select common-input common-input--withLeftIcon pill text-gray-800" name="location">
                                    <option value="Location" disabled selected>Location</option>
                                    <option value="all">All</option>
                                    <option value="guagua">Guagua</option>
                                    <option value="pampanga">pampanga</option>
                                    <option value="philippines">philippines.</option>
                                   
                                </select>
                                <span class="input-icon input-icon--left text-gradient">
                                    <img src="{{ asset('frontend/assets/images/icons/location.svg') }}" alt="">
                                </span>
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-3 col-sm-6 col-xs-6">
                            <div class="">
                                
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <label for="">Check in Date</label>
                                        <input type="date" name="checkin" class="common-input d-inline" min="{{ date('Y-m-d') }}"> 
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <label for="">Check out Date</label>
                                        <input type="date" name="checkout"  class="common-input d-inline" min="{{ date('Y-m-d')  }}"> 
                                    </div>
                                    
                                
                                </div>
                               
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                            <label for="accommodation">Accommodation</label>
                            <div class="select-has-icon">
                                
                                <select class="form-select common-input common-input--withLeftIcon pill text-gray-800" name="accommodation">
                                    <option value="accommodation" disabled selected>Person</option>
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>   
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                    <option value="7">07</option>
                                    <option value="8">08</option>
                                    <option value="9">09</option>
                                    <option value="10">10</option>

                                   
                                </select>
                                <span class="input-icon input-icon--left text-gradient">
                                    <img src="{{ asset('frontend/assets/images/icons/location.svg') }}" alt="">
                                </span>
                            </div>
                        </div>
                  

                        
                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">

                            @php
                                $propertyTypes = App\Models\Property::all();
                                $types = array_unique($propertyTypes->pluck('type')->toArray());

                            @endphp
                            <label for="type"> Type </label>
                            <div class="select-has-icon">
                                
                                <select class="form-select common-input common-input--withLeftIcon pill text-gray-800" name="type">
                                    <option value="Type" disabled selected>Type</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type }}">{{ $type }}</option>
                                    @endforeach
                                </select>
                                <span class="input-icon input-icon--left text-gradient">
                                    <img src="{{ asset('frontend/assets/images/icons/type.svg') }}" alt="">
                                </span>
                            </div>
                        </div>
                        
                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                            <div class="position-relative">
                                <button type="submit" class="btn btn-main text-uppercase mt-4"> Search </button>
                                <span class="input-icon input-icon--left text-gradient">
                                    <img src="{{ asset('frontend/assets/images/icons/filter.svg') }}" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="property-filter__bottom flx-between gap-2">
                    <span class="property-filter__text font-18 text-gray-800">Showing {{ $properties->firstItem() }} -
                        {{ $properties->lastItem() }} of {{ $properties->total() }} results</span>
                    <div class="d-flex align-items-center gap-2">
                        <div class="list-grid d-flex align-items-center gap-2 me-4">
                            <button class="list-grid__button grid-button active text-body"><i
                                    class="las la-border-all"></i></button>
                            <button class="list-grid__button list-button text-body"><i class="las la-list"></i></button>
                        </div>
                        {{-- <div class="d-flex align-items-center gap-2">
                            <span class="property-filter__text font-18 text-gray-800"> Sort by: </span>
                            <div class="select-has-icon">
                                <select class="form-select common-input pill text-gray-800 px-3 py-2">
                                    <option value="Newest">Newest</option>
                                    <option value="Best Seller">Best Seller</option>
                                    <option value="Best Match">Best Match</option>
                                    <option value="Low Price">Low Price</option>
                                    <option value="High Price">High Price</option>
                                </select>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>





            <div class="list-grid-item-wrapper show-two-item row gy-4">

                @if ($properties->count() == 0)
                @else
                    @foreach ($properties as $property)
                   
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="{{ route('property', $property->id) }}" class="link">
                                        <img src=" {{ asset('storage/' . $property->thumbnail) }}" alt=""
                                            class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="{{ route('property', $property->id) }}" class="link">
                                            {{ $property->name }}
                                        </a>
                                    </h6>
                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text"> {{ $property->bedroom }} Beds</span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text"> {{ $property->bathroom }} Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> ${{ $property->price }}
                                        <span class="day">/per day</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        {{ $property->address }}
                                    </p>
                                    <a href="#" class="simple-btn text-gradient fw-semibold font-14">Book Now
                                        <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination common-pagination">

                    {{ $properties->links() }}
                </ul>
            </nav>
            @endif




        </div>
    </section>
    <!-- ======================== Property Section End ============================ -->

    <!-- ============================= CTA section Start ===================== -->
    <section class="cta padding-b-120">
        <div class="container container-two">
            <div class="cta-box flx-between gap-2">
                <div class="cta-content">
                    <h2 class="cta-content__title">Subscribe To Our <span class="text-gradient">Newsletter</span> </h2>
                    <p class="cta-content__desc">It is a long established fact that a reader will be distracted by the
                        readable content of a page when looking at its layout.</p>
                    <form action="#" class="cta-content__form d-flex align-items-center gap-2">
                        <div class="position-relative w-100">
                            <input type="text" class="common-input common-input--withLeftIcon w-100"
                                placeholder="Enter Your Email Address">
                            <span class="input-icon input-icon--left text-gradient font-20 line-height-1"><i
                                    class="far fa-envelope"></i></span>
                        </div>
                        <button type="submit" class="btn btn-main text-uppercase flex-shrink-0"> Subscribe <span
                                class="text">Now</span> </button>
                    </form>
                </div>
                <div class="cta-content__thumb d-xl-block d-none">
                    <img src="assets/images/thumbs/cta-img.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- ============================= CTA section End ===================== -->
@endsection
