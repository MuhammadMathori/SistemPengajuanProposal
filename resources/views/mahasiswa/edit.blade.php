@extends('layouts.app')

@section('title', 'Ubah Mahasiswa')

@php
    $alamatJson = json_decode($mahasiswa->alamat);
@endphp

@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Ubah Mahasiswa</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ubah Mahasiswa</li>
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
                            <h4 class="card-title text-center text-md-start">Ubah Mahasiswa</h4>
                            <div class="mt-3 text-center mt-md-0 text-md-end">
                                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST"
                                    id="form">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" name="nama" class="form-control"
                                                    value="{{ old('nama', $mahasiswa->nama) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control"
                                                    value="{{ old('email', $mahasiswa->user->email) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="nim" class="form-label">NIM</label>
                                                <input type="text" name="nim" class="form-control"
                                                    value="{{ old('nim', $mahasiswa->nim) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <textarea name="alamat" class="form-control">{{ old('alamat', $alamatJson->alamat ?? '') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="provinsi" class="form-label">Provinsi</label>
                                                <input type="text" name="provinsi" class="form-control"
                                                    value="{{ old('provinsi', $alamatJson->provinsi ?? '') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
