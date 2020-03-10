@extends('layout.app')

@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {!! session('success') !!}
                </div>
            @endif
        </div>
        @foreach ($products as $key => $p)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2>{{ $p->name }}</h2>
                        <hr>
                        <b>Rp. {{ number_format($p->price) }}</b>
                        <div class="mt-3">
                            @if (!Auth::check())
                                <a href="{{ route('add.to.cart', $p->id) }}" class="btn btn-primary">
                                    Add To Cart
                                </a>
                            @else 
                                <b class="text-danger">Your Admin!</b>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection