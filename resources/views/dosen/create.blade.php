@extends('layouts.app')
@section('title', 'Tambah Dosen')
@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Dosen</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Dosen</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-md-flex justify-content-between align-items-center">
                            <h4 class="card-title text-center text-md-start">Tambah Dosen</h4>

                            <div class="mt-3 text-center mt-md-0 text-md-end">
                                <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('dosen.store') }}" method="POST" id="form">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" name="nama" class="form-control"
                                                    value="{{ old('nama') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control"
                                                    value="{{ old('email') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control"
                                                    value="{{ old('password') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="nip" class="form-label">NIP</label>
                                                <input type="text" name="nip" class="form-control"
                                                    value="{{ old('nip') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="kontak" class="form-label">Kontak</label>
                                                <input type="text" name="kontak" class="form-control"
                                                    value="{{ old('kontak') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
