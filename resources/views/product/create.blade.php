@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Create Product</h1>
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('product.store') }}">
                        @csrf
                        {{-- get form field --}}
                        @include('product.form')

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Daftar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
@endsection
