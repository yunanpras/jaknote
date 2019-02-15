@extends('layouts.app')

@section('title')
Prepaid Balance
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.include.alert')
            <div class="card">
                <div class="card-header">Prepaid Balance</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('payorder.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="order_no" class="col-md-4 col-form-label text-md-right">Order no.</label>

                            <div class="col-md-6">
                                <input id="order_no" name="order_no" type="text" maxlength="12" class="form-control{{ $errors->has('order_no') ? ' is-invalid' : '' }}"
                                    value="{{ Session::get('order_no') }}" placeholder="Order no." required autofocus>

                                @if ($errors->has('order_no'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('order_no') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

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
