@extends('layouts.app')
@yield('Home')

@section('content')

<section class="bmi-calculator-section spad">
    <div class="container mt-5">
        <div class="row">
           
            <div class="col-lg-12">
                <div class="section-title chart-calculate-title">
                    <span>Dashboard</span>
                    <h2>Hello {{ Auth::user()->name }}!</h2>
                </div>
                <div class="gallery-section">
                    <div class="gallery">
                        <div class="grid-sizer"></div>
                        <div class="gs-item grid-wide set-bg" data-setbg="{{asset('assets/img/gallery/gallery-1.jpg')}}">
                            <a href="" class="thumb-icon">
                                <h3 style="color: #ffff;">21 People Checkin at This Time</h3>
                            </a>
                        </div>
                        <div class="gs-item set-bg" data-setbg="{{asset('assets/img/gallery/gallery-2.jpg')}}">
                            <a href="{{asset('assets/img/gallery/gallery-2.jpg')}}" class="thumb-icon image-popup">
                                <h3 style="color: #ffff;">100 Membership</h3>
                            </a>
                        </div>
                        <div class="gs-item set-bg" data-setbg="{{asset('assets/img/gallery/gallery-3.jpg')}}">
                            <a href="{{asset('assets/img/gallery/gallery-3.jpg')}}" class="thumb-icon image-popup px-3">
                                <h3 style="color: #ffff;">40 People has checked in today</h3>
                            </a>
                        </div>
                        <div class="gs-item set-bg" data-setbg="{{asset('assets/img/gallery/gallery-4.jpg')}}">
                            <a href="{{asset('assets/img/gallery/gallery-4.jpg')}}" class="thumb-icon image-popup">
                                <h3 style="color: #ffff;">10 Membership Transactions</h3>
                            </a>
                        </div>
                        <div class="gs-item set-bg" data-setbg="{{asset('assets/img/gallery/gallery-5.jpg')}}">
                            <a href="{{asset('assets/img/gallery/gallery-5.jpg')}}" class="thumb-icon image-popup">
                                <h3 style="color: #ffff;">15 Beverages has been sold</h3>
                            </a>
                        </div>
                        <div class="gs-item grid-wide set-bg" data-setbg="{{asset('assets/img/gallery/gallery-6.jpg')}}">
                            <a href="{{asset('assets/img/gallery/gallery-6.jpg')}}" class="thumb-icon image-popup">
                                <h3 style="color: #ffff;">Rp. 1.000.000 income today</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection