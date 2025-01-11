@extends('layouts.app')
@section('title', 'Create Memberships')
@section('content')
<section class="bmi-calculator-section spad">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 px-5">
                <div class="section-title chart-calculate-title">
                    <span>Sales Transactions</span>
                    <h2>Add Sales Transaction</h2>
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

                    <form method="POST" action="{{ route('admin.salestransactions.store', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <select name="" class="form-control mb-2 inventory-select">
                                    <option value="">Select Inventory</option>
                                    @foreach ($inventories as $inventory)
                                        <option value="{{ $inventory->id }}" data-price="{{ $inventory->price }}">{{ $inventory->name }} - Stock: {{ $inventory->stock }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <input type="number" name="" placeholder="Quantity" class="form-control mb-2 quantity-input">
                            </div>
                            <div class="col-sm-3">
                                <span class="item-subtotal">Subtotal: 0.00</span>
                            </div>
                        </div>

                        <div id="items-container"></div> <!-- Container for dynamic items -->

                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <button type="button" id="add-item" class="btn btn-secondary">Add Item</button>
                            </div>
                        </div>

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
                                <h4>Total: <span id="total-amount">0.00</span></h4>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
