@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Home</h1>
        <div class="row">
            <h4 class="mt-5">List Product</h4>
            @foreach ($products as $product)
                <div class="col-md-4 text-center">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title">{{ $product->nama }}</h1>
                            <p class="card-text">{{ $product->deskripsi }}</p>
                            <button id="addToCart" class="btn btn-success" data-product-id="{{ $product->id }}">Add to cart</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $('#addToCart').click(function () {
                let productId = $(this).data('product-id');

                $.ajax({
                    type: 'POST',
                    url: '{{ route('cart.add') }}',
                    data: {
                        productId: productId,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function (data) {
                        console.log(data);
                        if (data.success) {
                            alert('Product has been added to cart!');
                        }
                    },
                    error: function (error) {
                        console.log(error);
                        alert('Error adding product to cart. Please try again.');
                    }
                });
            });
        });
    </script>
@endpush
