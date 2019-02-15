@extends('layouts.app')

@section('title')
    Order
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="">Order no.</label>
                        </div>
                        <div class="col-md-4">
                            {{ Session::get('order_no') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">Total</div>
                        <div class="col-md-4">
                            {{ number_format(Session::get('total')) }}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                     <a href="{{ route('payorder.index') }}" class="btn btn-primary">Pay Now</a>
                </div>
            </div>

            @include('layouts.include.alert')
        </div>
    </div>
</div>
@endsection
