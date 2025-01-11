@extends('layouts.app')
@section('title','Inventory')

@section('content')
<section class="bmi-calculator-section spad">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between">
                    <div class="section-title chart-calculate-title">
                        <span>Inventories</span>
                        <h2>Inventories List</h2>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="chart-calculate-form mt-5 mr-7">
                            <form action="{{ route('admin.inventories.index') }}" method="GET">
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
                            <a href="{{ route('admin.inventories.create') }}" class="primary-btn">Add Inventory</a>
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
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($inventories as $key => $inventory)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $inventory->name }}</td>
                                    <td>{{ $inventory->stock }}</td>
                                    <td>{{ $inventory->price }}</td>
                                    <td>
                                        <a href="{{ route('admin.inventories.show', $inventory->id) }}" class="btn btn-sm btn-primary">
                                            View
                                        </a>
                                        <a href="{{ route('admin.inventories.edit', $inventory->id) }}" class="btn btn-sm btn-secondary">
                                            Edit
                                        </a>
                                        
                                        
                                        <form action="{{ route('admin.inventories.destroy', $inventory->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"  class="btn btn-sm btn-danger">Delete</button>
                                        </form>
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
