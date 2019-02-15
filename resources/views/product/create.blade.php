@extends('layouts.app')

@section('title')
    Product
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.include.alert')
            <div class="card">
                <div class="card-header">Product Page</div>

                <div class="card-body">
                <form method="POST" action="{{ route('product.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="product" class="col-md-4 col-form-label text-md-right">Product</label>

                            <div class="col-md-6">
                            <textarea name="product" id="product" rows="3" class="form-control{{ $errors->has('product') ? ' is-invalid' : '' }}">{{ old('product') }}</textarea>

                                @if ($errors->has('product'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('product') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="shipping_address" class="col-md-4 col-form-label text-md-right">Shipping Address</label>

                            <div class="col-md-6">
                            <textarea name="shipping_address" id="shipping_address" rows="3" class="form-control{{ $errors->has('shipping_address') ? ' is-invalid' : '' }}">{{ old('shipping_address') }}</textarea>                            

                                @if ($errors->has('shipping_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('shipping_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product" class="col-md-4 col-form-label text-md-right">Price</label>

                            <div class="col-md-6">
                                <input type="text" name="price" id="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" value="{{ old('price') }}">

                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input type="hidden" name="orderable_type" value="App\Product">
                        <input type="hidden" name="orderable_id" value="1">

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

