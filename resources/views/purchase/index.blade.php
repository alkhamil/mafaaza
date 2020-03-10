@extends('layout.app')

@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Code</th>
                        <th>Date</th>
                        <th>Grand Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key => $o)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                <a href="{{ route('purchase.details', $o->code) }}">
                                    {{ $o->code }}
                                </a>
                            </td>
                            <td>{{ date('d M Y H:i:s', strtotime($o->created_at)) }}</td>
                            <td>Rp. {{ number_format($o->grand_total) }}</td>
                            <td>
                                @if ($o->status === false)
                                    <div class="badge badge-danger">Not Approved</div>
                                @else 
                                    <div class="badge badge-success">Approved</div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection