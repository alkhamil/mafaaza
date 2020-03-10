@extends('layout.app')

@section('content')
    <div class="row mt-3">
        @php
            $cart = Session::get('cart');
        @endphp
        @if ($cart !== null)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($cart as $key => $c)
                        @php
                            $total += $c['price']*$c['quantity'];
                        @endphp
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $c['name'] }}</td>
                            <td>{{ $c['quantity'] }}</td>
                            <td align="right">Rp. {{ number_format($c['price']) }}</td>
                            <td align="right">Rp. {{ number_format($c['price']*$c['quantity']) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" align="right">
                            <b>Grand Total</b>
                        </td>
                        <td align="right">
                            <b>Rp. {{ number_format($total) }}</b>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-2">
                <a href="{{ route('checkout.form') }}" class="btn btn-success">
                    Checkout
                </a>
            </div>
        @else 
            <div class="alert alert-danger">
                Kerangjang anda kosong !
            </div>
        @endif
    </div>
@endsection