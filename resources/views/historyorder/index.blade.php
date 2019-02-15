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
                    <div class="table-responsive">
                        <table class="table table-striped">
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->order_no }} - {{ $order->total }}</td>
                                    {{-- <td>{{ $order->orderable_type->mobile_number }}</td> --}}
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
