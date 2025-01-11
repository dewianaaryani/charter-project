@extends('layouts.app')
@yield('Home')

@section('content')
    

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hs-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="{{ asset('assets/img/hero/hero-1.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="hi-text">
                                <span>Sentinel Strength</span>
                                <h1>Be <strong>strong</strong> traning hard</h1>
                                <a href="#" class="primary-btn">Join Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hs-item set-bg" data-setbg="{{ asset('assets/img/hero/hero-2.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="hi-text">
                                <span>Sentinel Strength</span>
                                <h1>Be <strong>strong</strong> traning hard</h1>
                                <a href="#" class="primary-btn">Join Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- ChoseUs Section Begin -->
    <section class="choseus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Why chose us?</span>
                        <h2>PUSH YOUR LIMITS FORWARD</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-034-stationary-bike"></span>
                        <h4>Modern equipment</h4>
                        <p>Our gym is equipped with state-of-the-art machines and tools designed to optimize your workouts. From cardio to strength training, our modern equipment helps you achieve your fitness goals efficiently and safely.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-033-juice"></span>
                        <h4>Healthy nutrition food and drinks</h4>
                        <p>Fuel your body with our range of healthy snacks and beverages. Designed to complement your fitness routine, these options provide the nutrients you need to recover and perform at your best.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-002-dumbell"></span>
                        <h4>Profesional training</h4>
                        <p>Achieve your fitness aspirations with the guidance of our certified trainers. Whether you're a beginner or an athlete, our personalized training programs are crafted to suit your needs and maximize your potential.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ChoseUs Section End -->

    

    <!-- Banner Section Begin -->
    <section class="banner-section set-bg" data-setbg="{{asset('assets/img/banner-bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="bs-text">
                        <h2>registration now to get more deals</h2>
                        <div class="bt-tips">Where health, beauty and fitness meet.</div>
                        <a href="#" class="primary-btn  btn-normal">Register Now</a>
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

    <!-- Gallery Section Begin -->
    <div class="gallery-section">
        <div class="gallery">
            <div class="grid-sizer"></div>
            <div class="gs-item grid-wide set-bg" data-setbg="{{asset('assets/img/gallery/gallery-1.jpg')}}">
                <a href="{{asset('assets/img/gallery/gallery-1.jpg')}}" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="{{asset('assets/img/gallery/gallery-2.jpg')}}">
                <a href="{{asset('assets/img/gallery/gallery-2.jpg')}}" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="{{asset('assets/img/gallery/gallery-3.jpg')}}">
                <a href="{{asset('assets/img/gallery/gallery-3.jpg')}}" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="{{asset('assets/img/gallery/gallery-4.jpg')}}">
                <a href="{{asset('assets/img/gallery/gallery-4.jpg')}}" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="{{asset('assets/img/gallery/gallery-5.jpg')}}">
                <a href="{{asset('assets/img/gallery/gallery-5.jpg')}}" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item grid-wide set-bg" data-setbg="{{asset('assets/img/gallery/gallery-6.jpg')}}">
                <a href="{{asset('assets/img/gallery/gallery-6.jpg')}}" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
        </div>
    </div>
    <!-- Gallery Section End -->

    
@endsection
