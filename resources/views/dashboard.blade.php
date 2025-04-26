@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="page-heading">
        <h3>Dashboard</h3>
    </div>
    <div class="page-content">
        <section class="row justify-content-center align-items-center" style="height: 50vh;">
            <div class="col-12 text-center">
                <h1>Selamat Datang {{ auth()->user()->name }}</h1>
            </div>
        </section>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" crossorigin href="{{ asset('assets/compiled/css/iconly.css') }}">
@endpush

@push('scripts')
@endpush
