@extends('layouts.app')
@section('title', 'Create Memberships')
@section('content')
<section class="bmi-calculator-section spad">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 px-5">
                <div class="section-title chart-calculate-title">
                    <span>Sales Transactions</span>
                    <h2>Transaction #{{ $salesTransaction->id }}</h2>
                    <h2>For <a href="{{ route('admin.memberships.show', $salesTransaction->member->user->id) }}" class="primary-color">{{ $salesTransaction->member->user->name }}</a></h2>
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
                    @if ($salesTransaction->details->isNotEmpty())
                        <div class="mb-5">
                            <ul class="trainer-info">
                                <li><span>No</span><span>Product Name</span><span>Quantity</span><span>Unit Price</span><span>Subtotal</span></li>
                                @foreach ($salesTransaction->details as $key => $detail)
                                    <li>
                                        <span>{{ $key + 1 }}</span>
                                        <span>{{ $detail->inventory->name }}</span> 
                                        <span>{{ $detail->quantity }}</span> 
                                        <span>{{ $detail->unit_price }}</span>
                                        <span>{{ $detail->subtotal }}</span>
                                        @if ($salesTransaction->status == 'pending')
                                            <span>
                                                <form action="{{ route('admin.detailstransactions.destroy', $detail->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"  class="danger-btn">X</button>
                                                </form>
                                            </span>
                                        @endif
                                       
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <p>Add Records for this transaction.</p>
                    @endif

                    @if ($salesTransaction->status == 'pending')
                        <form method="POST" action="{{ route('admin.detailstransactions.store', $salesTransaction->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <select name="inventory_id" class="form-control mb-2 inventory-select">
                                        <option value="">Select Inventory</option>
                                        @foreach ($inventories as $inventory)
                                            <option value="{{ $inventory->id }}">{{ $inventory->name }} - Stock: {{ $inventory->stock }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <input type="number" name="quantity" placeholder="Quantity" class="form-control mb-2 quantity-input">
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" id="add-item" class="btn btn-secondary">Add Item</button>
                                </div>
                            </div>
                        </form>
                    
                        <form action="{{ route('admin.salestransactions.update', $salesTransaction->id) }}" method="POST">

                            @csrf
                            @method('PUT')
                            <div class="row mt-4">
                                <div class="col-lg-12">
                                    <label for="payment_method" class="form-label white-color">Payment Method</label>
                                    <select name="payment_method" id="payment_method" class="form-control">
                                        <option value="cash">Cash</option>
                                        <option value="membership_credit">Membership Credit</option>
                                        <option value="transfer">Transfer</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <h1 class="white-color">Total: <span id="total-amount">{{ $salesTransaction->details->sum('subtotal') }}</span></h1>
                                </div>
                            </div>
                    
                            <div class="col-lg-12 mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    @else
                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <h1 class="white-color">Total: <span id="total-amount">{{ $salesTransaction->details->sum('subtotal') }}</span></h1>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
