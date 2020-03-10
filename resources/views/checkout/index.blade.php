@extends('layout.app')

@section('content')
    <div class="row mt-3">
        <div class="col-md-6">
            <h2>Isi data dengan benar !</h2>
        </div>
    </div>
    @php
        $user = Auth::user();
    @endphp
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="number" class="form-control" name="phone" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="address" class="form-control" cols="10" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Continue</button>
                </div>
            </form>
        </div>
    </div>
@endsection