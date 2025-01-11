@extends('layouts.app')
@yield('Show Member')

@section('content')

    <section class="bmi-calculator-section spad">
        <div class="container">
            <div class="section-title chart-calculate-title mt-5">
                <span>Memberships</span>
                <h2>Membership Details</h2>
            </div>
            <div class="membership-card center justify-content-center"> 
                <div class="membership-card-body p-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                
                                <h1 class="title-card">#{{ $user->member->member_code }}</h1>
                                <div>
                                    <img src="{{asset('assets/img/logo.png')}}" class="" alt="Logo">
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="d-flex justify-content-center align-items-center membership-card-details">
                        <div class="photo mr-5 ">
                            <img src="{{asset('storage/' . $user->member->profile_photo)}}" alt="Profile Photo">
                        </div>
                        <div class="details">
                            <h2 class="primary-color">{{$user->name}}</h2>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="mr-3">
                                    <ul class="trainer-info">
                                        <li><span>Email</span>{{$user->email}}</li>
                                        <li><span>Phone</span>{{$user->member->phone ?? 'N/A'}}</li>
                                        <li><span>Birth Date</span>{{$user->member->birth_date ?? 'N/A'}}</li>
                                        <li><span>Address</span>{{$user->member->address ?? 'N/A'}}</li>
                                        
                                    </ul>
                                </div>
                                <div class="ml-3">
                                    <ul class="trainer-info">
                                        <li><span>Start Date</span>{{$user->member->start_date ?? 'N/A'}}</li>
                                        <li><span>Expire Date</span>{{$user->member->end_date ?? 'N/A'}}</li>
                                        <li><span>Membership Type</span>{{$user->member->membership_type ?? 'N/A'}}</li>
                                        <li><span>Status</span>{{$user->member->status ?? 'N/A'}}</li>
                                    </ul>
                                </div>
                            </div>
                            
                            {{-- <div class="btn btn-danger">expired</div> --}}
                        </div>  
                    </div>
                    
                    
                    
                </div>
                <div class="membership-card-footer d-flex justify-content-between">
                    <p class="primary-color">{{$user->name}} was spend 100 hours in gym</p>
                    <div class="d-flex justify-content-between">
                        @if($user->member->status == 'inactive')
                            <a href="{{route('admin.membershiptransactions.create', $user->id)}}" class="primary-btn mr-5">Activate Membership</a>
                        @else
                            <a href="{{route('admin.membershiptransactions.create', $user->id)}}" class="primary-btn mr-5">Renewal Membership</a>
                        @endif
                        @if($accesslog && $accesslog->status === 'ongoing')
                            <form action="{{ route('admin.checkout.gym', $user->member->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn danger-btn">Check-Out</button>
                            </form>
                        @else
                            <form action="{{ route('admin.checkin.gym', $user->member->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn primary-btn">Check-In</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>


    
@endsection
