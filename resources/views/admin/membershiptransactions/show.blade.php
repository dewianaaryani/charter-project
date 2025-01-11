@extends('layouts.app')
@section('title', 'Memberships Show')
@section('content')
<section class="bmi-calculator-section spad">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 px-5">
                <div class="section-title chart-calculate-title">
                    <span>Mebership Transactions</span>
                    <h2>Transaction #{{ $membershipTransaction->id }}</h2>
                   
                </div>
                <div class="chart-calculate-form">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="details">
                        <h2 class="primary-color">{{$membershipTransaction->member->user->name}}</h2>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-3">
                                <ul class="trainer-info">
                                    <li><span>Membership Type</span>{{$membershipTransaction->member->membership_type ?? 'N/A'}}</li>
                                    <li><span>Start Date</span>{{$membershipTransaction->member->start_date ?? 'N/A'}}</li>
                                    <li><span>End Date</span>{{$membershipTransaction->member->end_date ?? 'N/A'}}</li>
                                    <li><span>Status</span>{{$membershipTransaction->member->status ?? 'N/A'}}</li>
                                    
                                </ul>
                            </div>
                            <div>
                                <ul class="trainer-info">
                                  
                                    <li><span>Amount</span>{{$membershipTransaction->amount ?? 'N/A'}}</li>
                                    <li><span>Payment Method</span>{{$membershipTransaction->payment_method ?? 'N/A'}}</li> 
                                    <li><span>Transaction Type</span>{{$membershipTransaction->transaction_type ?? 'N/A'}}</li>
                                    <li><span>Created At</span>{{$membershipTransaction->created_at ?? 'N/A'}}</li>
                                </ul>
                            </div>
                            <div class="ml-3">
                                
                            </div>
                        </div>
                        
                        {{-- <div class="btn btn-danger">expired</div> --}}
                    </div> 
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
