@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Products</div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success mt-5">
                {{ session('success') }}
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
