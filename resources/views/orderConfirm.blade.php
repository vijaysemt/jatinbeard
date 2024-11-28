@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Order Confirmation') }}</div>

                    <div class="card-body">
                        <p>Your order has been confirmed. Thank you for shopping with us!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
