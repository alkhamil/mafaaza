@extends('layout.app')

@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {!! session('success') !!}
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {!! session('error') !!}
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
                            @if (Auth::check())
                                @if (Auth::user()->role === 0)
                                    <a href="{{ route('add.to.cart', $p->id) }}" class="btn btn-primary">
                                        Add To Cart
                                    </a>
                                @else 
                                    <b class="text-danger">Your Admin!</b>
                                @endif
                            @else 
                                <button class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
                                    Add To Cart
                                </but>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('login.proses') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection