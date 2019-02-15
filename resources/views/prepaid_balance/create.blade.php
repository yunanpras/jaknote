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
                <form method="POST" action="{{ route('prepaidbalance.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="mobile_number" class="col-md-4 col-form-label text-md-right">Mobile Number</label>

                            <div class="col-md-6">
                                <input id="mobile_number" name="mobile_number" type="text" maxlength="12" class="form-control{{ $errors->has('mobile_number') ? ' is-invalid' : '' }}" value="{{ old('mobile_number', '081') }}" required autofocus>

                                @if ($errors->has('mobile_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="value" class="col-md-4 col-form-label text-md-right">Value</label>

                            <div class="col-md-6">
                                <select name="value" id="value" class="form-control{{ $errors->has('value') ? ' is-invalid' : '' }}">
                                    <option value="">-- Select Value --</option>
                                    <option {{ old('value') == '10000' ? 'selected' : '' }} value="10000">10000</option>
                                    <option {{ old('value') == '50000' ? 'selected' : '' }} value="50000">50000</option>
                                    <option {{ old('value') == '100000' ? 'selected' : '' }} value="100000">100000</option>
                                </select>

                                @if ($errors->has('value'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('value') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input type="hidden" name="orderable_type" value="App\PrepaidBalance">
                        <input type="hidden" name="orderable_id" value="2">

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

@push('script')
    <script>
        $(document).ready(function() {
            $('#mobile_number').keyup(function() {
                if($(this).val().indexOf('0') == 0) {
                    $(this).val($(this).val());
                }else{
                $(this).val("081" + $(this).val());
                }
            });
        });
    </script>
@endpush
