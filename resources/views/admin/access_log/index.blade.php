@extends('layouts.app')
@section('title','Memberships')

@section('content')
<section class="bmi-calculator-section spad">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between">
                    <div class="section-title chart-calculate-title">
                        <span>Access Log</span>
                        <h2>Access Log</h2>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="chart-calculate-form mt-5 mr-7">
                            <form action="{{ route('admin.accesslog.index') }}" method="GET">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    
                                   
                                </div>
                            </form>
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
                                <th>Image</th>
                                <th>Status</th>
                                <th>Check-In Time</th>
                                <th>Check-Out Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($accessLogs as $key => $accessLog)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $accessLog->member->user->name }}</td>
                                    <td><img src="{{asset('storage/' . $accessLog->member->profile_photo) }}" alt="" width="60px" height="60px"></td>
                                    <td>{{ $accessLog->status }}</td>
                                    <td>{{ $accessLog->check_in_time ?? '' }}</td>
                                    <td>{{ $accessLog->check_out_time ?? '' }}</td>
                                    <td>
                                        <a href="{{ route('admin.memberships.show', $accessLog->member->user->id) }}" class="btn btn-sm btn-primary">
                                            View Member Card
                                        </a>
                                    </td>
                                    
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No users found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
