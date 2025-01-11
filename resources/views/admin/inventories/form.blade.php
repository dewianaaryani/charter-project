@extends('layouts.app')
@section('title','Create Inventories')
@section('content')
<section class="bmi-calculator-section spad">
    <div class="container mt-5">
        <div class="row">
           
            <div class="col-lg-12  px-5">
                <div class="section-title chart-calculate-title">
                    @if(isset($inventory))
                        <span>Inventory</span>
                        <h2>Edit data</h2>
                    @else
                        <span>Inventory</span>
                        <h2>Create data</h2>
                    @endif
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
                    @if(isset($inventory))
                        <form method="POST" action="{{ route('admin.inventories.update', $inventory->id) }}" enctype="multipart/form-data">
                            @method('PUT')
                    @else
                        <form method="POST" action="{{ route('admin.inventories.store') }}" enctype="multipart/form-data">
                    @endif
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Name" name="name" class="@error('name') is-invalid @enderror" value="{{ old('name', $inventory->name ?? '')}}" required autofocus>
                                    @error('name')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <select name="category" class="form-control mb-2 inventory-select" >
                                        @if (isset($inventory))
                                            <option value="{{ $inventory->category }}" selected>{{ $inventory->category }}</option>
                                        @else
                                            <option value="">Select Category</option>
                                        @endif
                                        <option value="supplement">Supplement</option>
                                        <option value="drink">Drink</option>
                                        <option value="food">Food</option>
                                        <option value="equipment">Equipment</option>
                                    </select>
                                    @error('category')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input type="number" placeholder="Stock" name="stock" class="@error('stock') is-invalid @enderror" value="{{ old('stock', $inventory->stock ?? '')}}" required >
                                    @error('stock')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input type="number" placeholder="Price" name="price" class="@error('price') is-invalid @enderror" value="{{ old('price', $inventory->price ?? '')}}" required >
                                    @error('price')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input type="number" placeholder="Min Stock" name="min_stock" class="@error('min_stock') is-invalid @enderror" value="{{ old('min_stock', $inventory->min_stock ?? '')}}" required >
                                    @error('min_stock')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Supplier" name="supplier" class="@error('supplier') is-invalid @enderror" value="{{ old('supplier', $inventory->supplier ?? '')}}" required >
                                    @error('supplier')
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
