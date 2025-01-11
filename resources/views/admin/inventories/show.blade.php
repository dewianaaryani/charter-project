@extends('layouts.app')
@yield('Show Inventory')

@section('content')

    <section class="bmi-calculator-section spad">
        <div class="container">
            <div class="section-title chart-calculate-title mt-5">
                <span>Inventory</span>
                <h2>Inventory Details</h2>
            </div>
            <div class="membership-card center justify-content-center"> 
                <div class="membership-card-body p-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                
                                <h1 class="title-card">#{{ $inventory->id }}</h1>
                                <div>
                                    <img src="{{asset('assets/img/logo.png')}}" class="" alt="Logo">
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="d-flex justify-content-center align-items-center membership-card-details">
                        
                        <div class="details">
                            <h2 class="primary-color">{{$inventory->name}}</h2>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="mr-3">
                                    <ul class="trainer-info">
                                        <li><span>Category</span>{{$inventory->category ?? 'N/A'}}</li>
                                        <li><span>Stock</span>{{$inventory->stock ?? 'N/A'}}</li>
                                        <li><span>Price</span>{{$inventory->price ?? 'N/A'}}</li>
                                        <li><span>Min Stock</span>{{$inventory->min_stock ?? 'N/A'}}</li>
                                        <li><span>Supplier</span>{{$inventory->supplier ?? 'N/A'}}</li>
                                    </ul>
                                </div>
                                <div class="ml-3">
                                    
                                </div>
                            </div>
                            
                            {{-- <div class="btn btn-danger">expired</div> --}}
                        </div>  
                    </div>
                    
                    
                    
                </div>
                <div class="membership-card-footer d-flex justify-content-between">
                    <p class="primary-color"></p>
                    <div class="d-flex justify-content-between">
                        <a href="{{route('admin.inventories.edit', $inventory->id)}}" class="primary-btn mr-5">Edit</a>
                        <form action="{{route('admin.inventories.destroy', $inventory->id)}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn danger-btn" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </section>


    
@endsection
