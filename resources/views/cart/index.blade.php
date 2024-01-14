@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <p>ID</p>
                            <p>NAMA</p>
                            <p>HARGA</p>
                            <p>QTY</p>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            @foreach ($carts as $cart)
                                <p>{{ $cart['id_produk'] }}</p>
                                <p>{{ $cart['nama'] }}</p>
                                <p>{{ $cart['harga'] }}</p>
                                <p>{{ $cart['qty'] }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
