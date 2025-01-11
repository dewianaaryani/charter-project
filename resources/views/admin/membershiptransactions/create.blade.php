@extends('layouts.app')
@section('title','Create Memberships')
@section('content')
<section class="bmi-calculator-section spad">
    <div class="container mt-5">
        <div class="row">
           
            <div class="col-lg-12  px-5">
                <div class="section-title chart-calculate-title">
                    
                        <span>Membership Transactions</span>
                        <h2>Add Transaction</h2>
                    
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
                   
                        <form method="POST" action="{{ route('admin.membershiptransactions.store', $user->id) }}" enctype="multipart/form-data">
                            @method('PUT')
                   
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Name" name="name" class="@error('name') is-invalid @enderror" value="{{ old('name', $user->name ?? '')}}" disabled>
                                    @error('name')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Code" name="member_code" class="@error('member_code') is-invalid @enderror" value="{{ old('member_code', $user->member->member_code ?? '')}}" disabled>
                                    @error('member_code')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <select name="membership_type" class="@error('membership_type') is-invalid @enderror" value="{{ old('membership_type', $user->member->membership_type ?? '')}}" required>
                                        <option value="daily">Daily - 100k</option>
                                        <option value="monthly">Monthly< - 300k</option>
                                        <option value="yearly">Yearly - 3000k</option>
                                    </select>
                                    @error('membership_type')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <select name="payment_method" class="@error('payment_method') is-invalid @enderror" value="{{ old('payment_method', $user->member->payment_method ?? '')}}" required>               
                                        <option value="cash">Cash</option>
                                        <option value="transfer">Transfer</option>
                                        <option value="credit_card">Credit Card</option>
                                    </select>
                                    @error('payment_method')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <select name="transaction_type" class="@error('transaction_type') is-invalid @enderror" value="{{ old('transaction_type', $user->member->transaction_type ?? '')}}" required>               
                                        <option value="registration">Registration</option>
                                        <option value="renewal">Renewal</option>
                                        <option value="upgrade">Upgrade</option>
                                    </select>
                                    @error('transaction_type')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror                                    
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
