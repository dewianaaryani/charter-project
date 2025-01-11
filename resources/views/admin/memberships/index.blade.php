@extends('layouts.app')
@section('title','Memberships')

@section('content')
<section class="bmi-calculator-section spad">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between">
                    <div class="section-title chart-calculate-title">
                        <span>Memberships</span>
                        <h2>{{ $users->count() }} Records</h2>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="chart-calculate-form mt-5 mr-7">
                            <form action="{{ route('admin.memberships.index') }}" method="GET">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <input 
                                            type="text" 
                                            name="search" 
                                            placeholder="Search" 
                                            class="pr-10" 
                                            value="{{ request('search') }}"
                                        >
                                    </div>
                                    <div class="pb-3 ml-2">
                                        <button type="submit" class="primary-btn px-2">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
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
                                <th>Email</th>
                                <th>Code</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $key => $user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->member->member_code ?? '' }}
                                        @if(!$user->member)
                                            <a href="{{ route('admin.memberships.create', ['user_id' => $user->id]) }}" class="btn btn-sm btn-primary">
                                                Create Member
                                            </a>
                                        @endif
                                    </td>
                                    <td>{{ $user->member && $user->member->status === 'active' ? 'Active' : 'Inactive' }}</td>

                                    <td>
                                        @if($user->member)
                                        
                                            <a href="{{ route('admin.memberships.show', $user->id) }}" class="btn btn-sm btn-primary">
                                                View
                                            </a>
                                            <a href="{{ route('admin.memberships.edit', $user->id) }}" class="btn btn-sm btn-warning">
                                                Edit
                                            </a>
                                            <a href="{{ route('admin.membershiptransactions.create', $user->id) }}" class="btn btn-sm btn-secondary">Memberships</a>
                                            
                                            <form action="{{ route('admin.salestransactions.store', $user->member->id) }}" class="d-inline" method="POST">
                                                @csrf
                                                <button class="btn btn-sm btn-primary">Sales</button>
                                            </form>

                                            {{-- <a href="{{route('admin.salestransactions.create', $user->id)}}" class="btn btn-sm btn-secondary">Sales</a> --}}
                                        
                                        @endif
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
