@extends('layouts.app')
@section('title','Memberships')

@section('content')
<section class="bmi-calculator-section spad">
    
    
    <div class="container mt-5">
        <div class="chart-calculate-form mt-5 ">
            <form action="{{ route('admin.reports.index') }}" method="GET">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="row">
                        <div class="col-sm-4">
                            <input 
                                type="date" 
                                name="start_date" 
                                class="form-control mr-2" 
                                value="{{ request('start_date') }}"
                                placeholder="Start Date"
                            >
                        </div>
                        <div class="col-sm-4">
                            <input 
                                type="date" 
                                name="end_date" 
                                class="form-control mr-2" 
                                value="{{ request('end_date') }}"
                                placeholder="End Date"
                            >
                        </div>
                        <div class="col-sm-4">
                            
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                    
                    
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between mt-5">
                    <div class="section-title chart-calculate-title">
                        <span>Memberships Transactions</span>
                        <h2>Membership Transactions</h2>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="chart-calculate-form mt-5 mr-7">
                            
                        </div>
                        <div class="ml-4">
                            {{-- <a href="{{ route('admin.memberships.create') }}" class="primary-btn">Add Membership</a> --}}
                        </div>
                    </div>
                </div>
                <div class="chart-table">
                    @if($message = Session::get('success'))
                      <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                          <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                          </button>
                          {{ $message }}
                        </div>
                      </div>                    
                    @endif
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Type</th>
                                <th>Payment Method</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($membershipTransactions as $key => $membershipTransaction)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $membershipTransaction->member->user->name }}</td>
                                    <td>{{ $membershipTransaction->amount }}</td>
                                    <td>{{ $membershipTransaction->transaction_type }}</td>
                                    <td>{{ $membershipTransaction->payment_method }}</td>
                                    <td>{{ $membershipTransaction->created_at }}</td>
                                    <td><a href="{{ route('admin.membershiptransactions.show', $membershipTransaction->id) }}" class="btn btn-sm btn-primary">View</a></td>
                                    
                                    
                                    
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No users found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-3 white-color">
                        <strong>Total Membership Amount:</strong> {{ number_format($totalMembershipAmount, 2) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between mt-5">
                    <div class="section-title chart-calculate-title">
                        <span>Sales Transactions</span>
                        <h2>Sales Transactions</h2>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="chart-calculate-form mt-5 mr-7">
                            
                        </div>
                        <div class="ml-4">
                            {{-- <a href="{{ route('admin.memberships.create') }}" class="primary-btn">Add Membership</a> --}}
                        </div>
                    </div>
                </div>
                <div class="chart-table">
                    @if($message = Session::get('success'))
                      <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                          <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                          </button>
                          {{ $message }}
                        </div>
                      </div>                    
                    @endif
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>payment Method</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($salesTransactions as $key => $salesTransaction)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $salesTransaction->member->user->name }}</td>
                                    <td>{{ $salesTransaction->total_amount }}</td>
                                    <td>{{ $salesTransaction->payment_method }}</td>
                                    <td>{{ $salesTransaction->created_at }}</td>
                                    
                                    
                                    
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No users found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-3 white-color">
                        <strong>Total Sales Amount:</strong> {{ number_format($totalSalesAmount, 2) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
