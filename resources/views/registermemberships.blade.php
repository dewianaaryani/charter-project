@extends('layouts.app')
@section('title','Create Memberships')
@section('content')
<section class="bmi-calculator-section spad">
    <div class="container mt-5">
        <div class="row">
           
            <div class="col-lg-12  px-5">
                <div class="section-title chart-calculate-title">
                    @if(isset($user->member))
                        <span>Edit</span>
                        <h2>Edit data</h2>
                    @else
                        <span>Create</span>
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
                        
                        <form method="POST" action="{{ route('postregistermemberships', $user->id) }}" enctype="multipart/form-data">
                    
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Phone" name="phone" class="@error('phone') is-invalid @enderror" value="{{ old('phone', $user->member->phone ?? '')}}" required autofocus>
                                    @error('phone')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Address" name="address" class="@error('address') is-invalid @enderror" value="{{ old('address', $user->member->address ?? '')}}" required >
                                    @error('address')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input type="date" placeholder="Birth Date" name="birth_date" class="@error('birth_date') is-invalid @enderror" value="{{ old('birth_date', $user->member->birth_date ?? '')}}" required >
                                    @error('birth_date')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input type="file" placeholder="Profile Photo" name="profile_photo" class="@error('profile_photo') is-invalid @enderror pt-2" required>

                                    @error('profile_photo')
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
