@extends('layout.app')

@section('content')
    <div class="row mt-3">
        <div class="col">
            <h1>CODE : {{ $order->code }}</h1>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($order->order_details as $key => $od)
                        @php
                            $total+=$od->price*$od->quantity;
                        @endphp
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ \App\Product::where('id',$od->product_id)->first()->name }}</td>
                            <td>{{ $od->quantity }}</td>
                            <td align="right">Rp. {{ number_format($od->price) }}</td>
                            <td align="right">Rp. {{ number_format($od->price*$od->quantity) }}</td>
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
        </div>
    </div>
@endsection