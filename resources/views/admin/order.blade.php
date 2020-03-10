@extends('layout.app')

@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {!! session('success') !!}
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Code</th>
                        <th>Date</th>
                        <th>Grand Total</th>
                        <th>Status</th>
                        <th>Action</th>
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
                            <td>
                                <a href="{{ route('approve.order', $o->id) }}" class="btn btn-success">Approve</a>
                                <a href="{{ route('disapprove.order', $o->id) }}" class="btn btn-danger">Disapprove</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection