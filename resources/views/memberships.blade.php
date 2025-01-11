@extends('layouts.app')
@yield('Home')

@section('content')
    @if ($member)
        
    <section class="pricing-section spad">
    
        <div class="container">
            <div class="membership-card center justify-content-center"> 
               
                {{-- <div class="membership-card-header">
                    <h1 class="">Gym Membership</h1>
                </div> --}}
                <div class="membership-card-body p-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <h1 class="title-card">#{{ $member->member_code }}</h1>
                                <div>
                                    <img src="{{asset('assets/img/logo.png')}}" class="" alt="Logo">
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="d-flex justify-content-center align-items-center membership-card-details">
                        <div class="photo mr-5 ">
                            <img src="{{asset('storage/' . $member->profile_photo)}}" alt="Profile Photo">
                        </div>
                        <div class="details">
                            <h2 class="primary-color">{{$member->user->name}}</h2>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="mr-3">
                                    <ul class="trainer-info">
                                        <li><span>Email</span>{{$member->user->email}}</li>
                                        <li><span>Phone</span>{{$member->phone ?? 'N/A'}}</li>
                                        <li><span>Birth Date</span>{{$member->birth_date ?? 'N/A'}}</li>
                                        <li><span>Address</span>{{$member->address ?? 'N/A'}}</li>
                                        <li><span>Membership Type</span>{{$member->membership_type ?? '*Contact the admin for the membership transaction'}}</li>
                                    </ul>
                                </div>
                                <div class="ml-3">
                                    <ul class="trainer-info">
                                        
                                    </ul>
                                </div>
                            </div>
                            
                            {{-- <div class="btn btn-danger">expired</div> --}}
                        </div>  
                    </div>
                    
                    
                    
                </div>
                <div class="membership-card-footer">
                    <p class="primary-color"></p>
                </div>
            </div>
        </div>
    </section>
    @else
        <!-- Banner Section Begin -->
    <section class="banner-section set-bg" data-setbg="{{asset('assets/img/banner-bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="bs-text">
                        <h2>You're currently dont have any membership</h2>
                        <a href="{{route('registermemberships', Auth::user()->id)}}" class="primary-btn  btn-normal">Register Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Pricing Section Begin -->
    <section class="pricing-section spad" id="pricing-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Our Plan</span>
                        <h2>Choose your pricing plan</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8">
                    <div class="ps-item">
                        <h3>Daily</h3>
                        <div class="pi-price">
                            <h2>Rp 100K</h2>
                            <span>1 Day</span>
                        </div>
                       
                        <a href="#" class="primary-btn pricing-btn">Join Now</a>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="ps-item">
                        <h3>Monthly</h3>
                        <div class="pi-price">
                            <h2>Rp 300K</h2>
                            <span>30 Days</span>
                        </div>
                       
                        <a href="#" class="primary-btn pricing-btn">Join Now</a>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="ps-item">
                        <h3>Yearly</h3>
                        <div class="pi-price">
                            <h2>Rp 3000K</h2>
                            <span>12 Months</span>
                        </div>
                        
                        <a href="#" class="primary-btn pricing-btn">Join Now</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing Section End -->
    @endif

    


    
@endsection
